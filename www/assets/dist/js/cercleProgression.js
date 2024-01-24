document.addEventListener('DOMContentLoaded', function() {
    const setCercleProgression = (element, valeur) => {
      // Ici, on accède à la valeur de l'attribut 'r' correctement
      const rayon = element.r.baseVal.value;
      const circonference = 2 * Math.PI * rayon;
      const progression = (valeur / 100) * circonference;
  
      // Utilisation correcte des littéraux de gabarits
      element.style.strokeDasharray = `${progression} ${circonference - progression}`;
    };
  
    // Sélection des éléments SVG circle avec la classe 'progress'
    const cercles = document.querySelectorAll('.progress');
  
    // Affectation de la progression pour chaque cercle
    setCercleProgression(cercles[0], 55); // Pour le cercle bleu
    setCercleProgression(cercles[1], 65); // Pour le cercle violet
    setCercleProgression(cercles[2], 80); // Pour le cercle rose
  });
  