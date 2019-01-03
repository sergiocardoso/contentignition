<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <a class="navbar-brand" href="#"><strong>Content Ignition</strong></a>
    
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
        <div class="navbar-nav">
            <a class="nav-item nav-link active" href="<?= $GLOBALS['conn']['original']; ?>">Reset Filters <span class="sr-only">(current)</span></a>
            <a class="nav-item nav-link disabled" href="#">
                <input type="text" class="form-control form-control-sm filter-client" id="client_id" placeholder="Filter Client ID" value="<?= $GLOBALS['conn']['filter']['client'] ?>">
            </a>
            <a class="nav-item nav-link disabled" href="#">
                <input type="text" class="form-control form-control-sm filter-deal" id="deal_id" placeholder="Filter Deal ID" value="<?= $GLOBALS['conn']['filter']['deal'] ?>">
            </a>
        </div>
    </div>
</nav>