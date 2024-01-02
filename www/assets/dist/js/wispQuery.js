let ajax = (method = "POST", request) => {  // Request: url, data, async, success, beforeSend, complete
    const ajaxFuncs = {
        x: () => {
            if (typeof XMLHttpRequest !== 'undefined') {
                return new XMLHttpRequest();
            }
            var versions = [
                "MSXML2.XmlHttp.6.0",
                "MSXML2.XmlHttp.5.0",
                "MSXML2.XmlHttp.4.0",
                "MSXML2.XmlHttp.3.0",
                "MSXML2.XmlHttp.2.0",
                "Microsoft.XmlHttp"
            ];

            var xhr;
            for (var i = 0; i < versions.length; i++) {
                try {
                    xhr = new ActiveXObject(versions[i]);
                    break;
                } catch (e) {
                }
            }
            return xhr;
        },
        send: (url, callback, method, data, async, beforeSend, complete) => {
            if (beforeSend != undefined) {
                beforeSend();
            }

            if (async === undefined) {
                async = true;
            }

            var x = ajaxFuncs.x();
            x.open(method, url, async);

            // Utilisation de Promises pour s'assurer que complete est appelée après callback
            var callbackPromise = new Promise((resolve) => {
                x.onreadystatechange = function () {
                    if (x.readyState == 4) {
                        if (callback != undefined) {
                            callback(x.responseText);
                            resolve(); // Résoudre la promesse après l'exécution de callback
                        }
                    }
                };
            });

            // Promesse pour s'assurer que complete est appelée après callback
            var completePromise = callbackPromise.then(() => {
                return new Promise((resolve) => {
                    if (complete != undefined) {
                        // Utiliser setTimeout pour simuler une opération asynchrone
                        setTimeout(() => {
                            complete();
                            resolve(); // Résoudre la promesse après l'exécution de complete
                        }, 0);
                    } else {
                        resolve();
                    }
                });
            });

            if (method == 'POST') {
                x.setRequestHeader('Content-type', 'application/x-www-form-urlencoded');
            }

            x.send(data);

            return completePromise; // Retourner la promesse pour permettre la gestion externe
        },


        query: () => {
            var query = [];
            for (var key in request.data) {
                query.push(encodeURIComponent(key) + '=' + encodeURIComponent(request.data[key]));
            }
            return query;
        },

        get: () => {
            ajaxFuncs.send(request.url + (ajaxFuncs.query(request).length ? '?' + ajaxFuncs.query(request).join('&') : ''), request.success, 'GET', null, request.async, request.onStart, request.onFinish)
        },
        post: () => {
            ajaxFuncs.send(request.url, request.success, 'POST', ajaxFuncs.query(request).join('&'), request.async, request.onStart, request.onFinish)
        },
    }

    if (method.toUpperCase() === "GET") ajaxFuncs.get();
    else if (method.toUpperCase() === "POST") ajaxFuncs.post();

    return ajaxFuncs;
};

let Json = () => {
    const mod =
        {
            From: (str) => {
                return JSON.parse(str);
            },
            To: (val) => {
                return JSON.stringify(val, null, 3);
            }
        };
    return mod;
};

let SList = () => {
    const mod =
        {
            From: (str) => {
                let list = str.replaceAll(",", "").split(' ');
                return list;
            },
            To: (val) => {
                let str = "";
                val.forEach((v) => { str += v + ", " });
                return str.slice(0, -1);
            }
        };
    return mod;
};

let partial = (url, data, method) => {
    return new Promise((resolve, reject) => {
        ajax(method, {
            url: url,
            data: data,
            success: (result) => {
                resolve(result);
            },
            error: (error) => {
                reject(error);
            }
        });
    });
};

function _(selector) {
    let element;
    if (selector instanceof Element || selector instanceof HTMLDocument) element = selector;
    else if (selector instanceof Function) return selector();
    else element = selector.startsWith('#') ? document.querySelector(selector) : document.querySelectorAll(selector);

    // Ajout des fonctionnalités ajax et partial à l'élément sélectionné
    if (element) {

        // Ajax functions
        element.ajax = (method, request) => {
            if (selector.startsWith('#')) {
                // Si c'est un ID, c'est probablement un formulaire, donc on empêche le comportement par défaut
                if (event) { event.preventDefault(); }

                let form = element;
                if (request.data == undefined) request.data = [];

                for (let i = 0; i < form.length; i++) {
                    let e = form.elements[i];
                    if (e.name != "") request.data[e.name] = e.type == "number" ? parseInt(e.value) : e.value;
                }
            }
            return ajax(method, request);
        };

        // Partial functions
        element.partial = (url, data, method) => {
            return partial(url, data, method)
                .then((result) => {
                    if (selector.startsWith('#')) {
                        element.innerHTML = result;
                    }
                    return result;
                });
        };

        // Value functions
        element.val = (value) => {
            if (value != undefined) element.value = value;
            else return element.value;
        };

        // Content functions
        element.html = (value) => {
            if (value != undefined) element.innerHTML = value;
            else return element.innerHTML;
        };
        element.text = (value) => {
            if (value != undefined) element.innerText = value;
            else return element.innerText;
        };

        // Attribute functions
        element.attr = (name, value) => {
            if (value != undefined) element.setAttribute(name, value);
            else return element.getAttribute(name);
        };
        element.removeAttr = (name) => {
            if (name != undefined) element.removeAttribute(name);
        };

        // Class functions
        element.addClass = (name) => {
            if (name != undefined) {
                SList().From(name).forEach((e) => { element.classList.add(e); })
            }
        };
        element.removeClass = (name) => {
            if (name != undefined) {
                SList().From(name).forEach((e) => { element.classList.remove(e); })
            }
        };
        element.toggleClass = (name) => {
            if (name != undefined) {
                SList().From(name).forEach((e) => { element.classList.toggle(e); })
            }
        };

        // CSS functions
        element.css = (style, value) => {
            if (style != undefined && value != undefined) {
                element.style[style] = value;
            }
        };

        // Events functions
        element.click = (func) => {
            element.onclick = (evt) => {
                func(evt);
            };
        }
        element.dblclick = (func) => {
            element.addEventListener("dblclick", (evt) => {
                func(evt);
            });
        }
        element.ready = (func) => {
            element.addEventListener("DOMContentLoaded", (evt) => {
                func(evt);
            });
        }

        // Display functions
        element.show = () => { element.style.display = "block"; };
        element.hide = () => { element.style.display = "none"; };
    }

    return element;
}