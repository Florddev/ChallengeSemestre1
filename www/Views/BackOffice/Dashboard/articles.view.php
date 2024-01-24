<div class="header-articles-dashboard">
    <div class="header-articles-dashboard-left">
        <h1><span>Articles</span> Dashboard</h1>
        <h2>ADMIN PANEL</h2>
    </div>
    <div class="header-articles-dashboard-right">
        <i class="ri-home-3-line"></i>
        <p><span>/ Dashboard </span>/ Articles</p>
    </div>
</div>

<div class="job-board">

  <aside class="sidebar-article">
    <h4>Filtre</h4>
    <div class="search-box">
      <input type="text" placeholder="Search..">
    </div>
    <div class="filter-box">
      <label><input type="checkbox" name="full-time"> Full-filtre (8688)</label>
      <label><input type="checkbox" name="contract"> Musique (503)</label>
      <label><input type="checkbox" name="contract"> Sport (759)</label>
      <label><input type="checkbox" name="contract"> Art (124)</label>
      <label><input type="checkbox" name="contract"> Archivé (95)</label>
      <!-- Repeat for other job types -->
    </div>
    <button class="btn-find-jobs">Appliquer</button>
  </aside>

  <main class="job-listings">
    <?php
    for ($i = 0; $i < 4; $i++) {
        ?>
        <div class="job">
            <div class="head-article">
                <div class="left-head-article">
                    <img src="https://admin.pixelstrap.com/poco/assets/images/job-search/3.jpg" alt="">
                    <div>
                        <h3>Senior UX designer</h3>
                        <p>Minneapolis, MN</p>
                    </div>
                </div>
                <span>Badge</span>
            </div>
            <p class="description-article">
                We are looking for an experienced and creative designer and/or frontend engineer with expertise in accessibility to join our team , 3+ years of experience working in as a Frontend Engineer or comparable role. You wont be a team of one though — youll be collaborating closely with other...
            </p>
        </div>
        <?php
    }
    ?>
    <div class="pagination">
        <a href="#" class="page-link">Previous</a>
        <a href="#" class="page-link active">1</a>
        <a href="#" class="page-link">2</a>
        <a href="#" class="page-link">3</a>
        <a href="#" class="page-link">Next</a>
    </div>
  </main>

</div>
