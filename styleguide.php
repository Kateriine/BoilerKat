<?php
/**
 * Template Name: Styleguide
 *
 * @package     WordPress
 * @subpackage  Adam
 */
?>
<?php Utilities::get_template_parts( array( 'parts/shared/html-header' ) ); ?>
<body class="">

<header class="header">
  <div class="nav-container">
    <div class="uk-container uk-container-center centered cont-nav">
        <div class="uk-navbar-brand"><a href="#">Styleguide</a></div>
        <div class="uk-float-right">
            <button class="uk-button-offcanvas uk-hidden-large" data-uk-offcanvas="{target:'#offcanvas-1'}">
              <div class="bit-1"></div>
              <div class="bit-2"></div>
              <div class="bit-3"></div>
            </button>
            <div class="uk-offcanvas">
                <nav class="uk-offcanvas-bar">
                    <ul class="uk-navbar uk-navbar-nav uk-nav-offcanvas"><li id="menu-item-7" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-7"><a href="http://permesso.spade.be/new-registration/">New registration</a></li>
                    <li id="menu-item-9" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-9"><a href="http://permesso.spade.be/split-testing/">Split testing</a></li>
                    <li id="menu-item-17" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-17"><a href="http://permesso.spade.be/disconnect/">Disconnect</a></li>
                    <li id="menu-item-21" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-21"><a href="http://permesso.spade.be/connect/">Connect</a></li>
                    <li id="menu-item-34" class="menu-item menu-item-type-post_type menu-item-object-page menu-item-34"><a href="http://permesso.spade.be/news/">News</a></li>
                    </ul>
                </nav>
            </div>
            <div id="offcanvas-1" class="uk-offcanvas uk-visible-small">                    
                <nav class="uk-offcanvas-bar">
                    <h3 class="uk-panel-title uk-panel-box">Summary</h3>
                    <div class="summary">    
                        <ul class="uk-navbar uk-navbar-nav uk-nav-offcanvas">
                          <li>
                            <a href="#s-1" data-uk-smooth-scroll>1. Titles and paragraphs</a>
                          </li>
                          <li>
                            <a href="#s-2" data-uk-smooth-scroll>2. Panels</a>
                          </li>
                          <li>
                            <a href="#s-3" data-uk-smooth-scroll>3. Buttons & labels</a>
                          </li>
                          <!--li>
                            <a href="#s-4" data-uk-smooth-scroll>4. Pictures</a>
                          </li-->
                          <li>
                            <a href="#s-5" data-uk-smooth-scroll>5. Lists</a>
                          </li>
                          <li>
                            <a href="#s-6" data-uk-smooth-scroll>6. Forms</a>
                          </li>
                          <li>
                            <a href="#s-7" data-uk-smooth-scroll>7. Tables</a>
                          </li>
                          <li>
                            <a href="#s-8" data-uk-smooth-scroll>8. Messages & Alerts</a>
                          </li>
                          <li>
                            <a href="#s-9" data-uk-smooth-scroll>9. Grid</a>
                          </li>
                          <li>
                            <a href="#s-10" data-uk-smooth-scroll>10. Text utilities</a>
                          </li>
                          <li>
                            <a href="#s-11" data-uk-smooth-scroll>11. General utilities</a>
                          </li>
                        </ul> 
                    </div>  
                </nav>
            </div>
        </div>        
    </div>
  </div>

  <div class="uk-cover" style="height: 300px;">
    <video class="uk-cover-object" width="600" height="400" autoplay loop muted controls>
        <source src="http://www.quirksmode.org/html5/videos/big_buck_bunny.mp4?test1" type="video/mp4">
        <source src="http://www.quirksmode.org/html5/videos/big_buck_bunny.ogv?test1" type="video/ogg">
    </video>
</div>
  <div class="uk-hero padding-verti-large">
    <div class="uk-container uk-container-center">
        <div class="uk-grid">
          <div class="uk-width-medium-2-3">
            <h1>Styleguide</h1>
            <p>On this page you'll find all your website content modules with the associated class names. Some more info might also be found on <a href="http://getuikit.com/" target="_blank">UIKit official documentation</a>.</p>
          </div>
          <div class="uk-width-medium-1-3">
            <div class="uk-panel uk-panel-bordered  uk-panel-default uk-hidden-small" data-uk-sticky>
              <h3 class="uk-panel-title uk-panel-box">Summary</h3>
              <div class="summary">    
                <ul class="uk-list uk-list-striped">
                  <li>
                    <a class="uk-link-muted" href="#s-1" data-uk-smooth-scroll>1. Titles and paragraphs</a>
                  </li>
                  <li>
                    <a class="uk-link-muted"  href="#s-2" data-uk-smooth-scroll>2. Panels</a>
                  </li>
                  <li>
                    <a class="uk-link-muted"  href="#s-3" data-uk-smooth-scroll>3. Buttons & labels</a>
                  </li>
                  <!--li>
                    <a class="uk-link-muted"  href="#s-4" data-uk-smooth-scroll>4. Pictures</a>
                  </li-->
                  <li>
                    <a class="uk-link-muted"  href="#s-5" data-uk-smooth-scroll>5. Lists</a>
                  </li>
                  <li>
                    <a class="uk-link-muted"  href="#s-6" data-uk-smooth-scroll>6. Forms</a>
                  </li>
                  <li>
                    <a class="uk-link-muted"  href="#s-7" data-uk-smooth-scroll>7. Tables</a>
                  </li>
                  <li>
                    <a class="uk-link-muted" href="#s-8" data-uk-smooth-scroll>8. Messages & Alerts</a>
                  </li> 
                  <li>
                    <a class="uk-link-muted"  href="#s-9" data-uk-smooth-scroll>9. Grid</a>
                  </li>
                  <li>
                    <a class="uk-link-muted"  href="#s-10" data-uk-smooth-scroll>10. Text utilities</a>
                  </li>
                  <li>
                    <a class="uk-link-muted"  href="#s-11" data-uk-smooth-scroll>11. General utilities</a>
                  </li>
                </ul>            
            </div>
          </div>
        </div>
          
      </div><!-- /uk-container uk-container-center  -->
    </div> 
  </div>
</header>

 
<div class="padding-verti" id="s-1">
    <div class="uk-container uk-container-center">
        <h2 class="uk-text-center">1. Titles and paragraphs</h2>
        <div class="uk-grid">
            <div class="uk-width-medium-2-3">
                <h1>h1 title</h1>
                <h2>h2 title</h2>
                <h3>h3 title</h3>
                <h4>h4 title</h4>
                <h5>h5 title</h5>
                <h6>h6 title</h6>
                <p>This is a paragraph with some <a>link</a>, some <strong>bold text</strong> and some <em>italic text</em>. </p>
                <p>This is a second paragraph.</p>
                <blockquote>This is a quote</blockquote>
            </div>
        </div>           
    </div>
</div>

<div class="padding-verti" id="s-2">
    <div class="uk-container uk-container-center">
        <h2 class="uk-text-center">2. Panels</h2>
        <div class="uk-grid uk-grid-match" data-uk-grid-match="{target:'.uk-panel'}">
            <div class="uk-width-medium-1-3">
                <div class="uk-panel">
                    <h2 class="uk-h4 uk-panel-title">.uk-panel</h2>
                    <p>
                        .uk-panel > .uk-h4.uk-panel-title
                    </p>
                    <p>To add a padding, add class .uk-panel-box</p>
                    
                </div><!-- /panel-default  -->
            </div>
            
            <div class="uk-width-medium-1-3">
                <div class="uk-panel uk-panel-box">
                    <h2 class="uk-h4 uk-panel-title">.uk-panel</h2>
                    <p>
                        .uk-panel.uk-panel-box > .uk-h4.uk-panel-title
                    </p>
                    
                </div><!-- /panel-default  -->
            </div>
        </div>

        <div class="uk-grid uk-grid-match" data-uk-grid-match="{target:'.uk-panel'}">
          <div class="uk-width-medium-1-3">
              <div class="uk-panel uk-panel-box uk-panel-box-primary">
                  <h2 class="uk-h4 uk-panel-title">.uk-panel</h2>
                  <p>
                      .uk-panel.uk-panel-box.uk-panel-box-primary > .uk-h4.uk-panel-title
                  </p>
                  
              </div><!-- /panel-default  -->
          </div>
          <div class="uk-width-medium-1-3">
              <div class="uk-panel uk-panel-box uk-panel-box-secondary uk-panel-space">
                  <h2 class="uk-h4 uk-panel-title">.uk-panel</h2>
                  <p>
                      .uk-panel.uk-panel-box.uk-panel-box-secondary.uk-panel-space > .uk-h4.uk-panel-title
                  </p>
                  
              </div><!-- /panel-default  -->
          </div>
          
        </div>
    </div>
</div>

<div class="uk-block uk-block-muted uk-block-large">

    <div class="uk-container uk-container-center">

         <h2 class="uk-text-center">Blocks</h2>
         <h3 class="uk-text-center">.uk-block .uk-block-muted</h3>

        <div class="uk-grid uk-grid-match" data-uk-grid-margin="">
            <div class="uk-width-medium-1-3 uk-row-first">
                <div class="uk-panel">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</p>
                </div>
            </div>
            <div class="uk-width-medium-1-3">
                <div class="uk-panel">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</p>
                </div>
            </div>
            <div class="uk-width-medium-1-3">
                <div class="uk-panel">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</p>
                </div>
            </div>
        </div>

    </div>

</div>

<div class="uk-block uk-block-primary uk-block-large">

    <div class="uk-container uk-container-center">

         <h3 class="uk-text-center">.uk-block .uk-block-primary</h3>

        <div class="uk-grid uk-grid-match" data-uk-grid-margin="">
            <div class="uk-width-medium-1-3 uk-row-first">
                <div class="uk-panel">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</p>
                </div>
            </div>
            <div class="uk-width-medium-1-3">
                <div class="uk-panel">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</p>
                </div>
            </div>
            <div class="uk-width-medium-1-3">
                <div class="uk-panel">
                    <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna.</p>
                </div>
            </div>
        </div>

    </div>

</div>

<div class="padding-verti" id="s-3">
    <div class="uk-container uk-container-center">
         <h3 class="uk-text-center">Article</h3>
         <article class="uk-article">
            <h2 class="uk-article-title">.uk-article-title</h2>
            <p class="uk-article-meta">.uk-article-meta</p>
            <p class="uk-article-lead">.uk-article-lead</p>
            <p>Normal text in article</p>
            <hr class="uk-article-divider">
            hr.uk-article-divider
        </article>
        <ul class="uk-comment-list">
          <li>
              <article class="uk-comment">
                <header class="uk-comment-header">
                    <h4 class="uk-comment-title">Comment (.uk-comment-title)</h4>
                    <div class="uk-comment-meta">.uk-comment-meta</div>
                </header>
                <div class="uk-comment-body">.uk-comment-body</div>
            </article>
          </li>
        </ul>
    </div>
</div>

<div class="padding-verti" id="s-3">
    <div class="uk-container uk-container-center">
        <div class="uk-grid">
            
            <div class="uk-width-medium-2-3">
              <h2 class="uk-text-center">3. Buttons & labels</h2>
                <h3>uk-button</h3>
              <p><a class="uk-button uk-button-round uk-button-small">.uk-button.uk-button-round.uk-button-small</a></p>
              <p><a class="uk-button uk-button-round">.uk-button.uk-button-round</a></p>
              <p><a class="uk-button uk-button-round uk-button-large">.uk-button.uk-button-round.uk-button-large</a></p>

              <h3>uk-button-primary</h3>
              <p><a class="uk-button uk-button-primary uk-button-small">.uk-button.uk-button-primary.uk-button-small</a></p>
              <p><a class="uk-button uk-button-primary">.uk-button.uk-button-primary</a></p>
              <p><a class="uk-button uk-button-primary uk-button-large">.uk-button.uk-button-primary.uk-button-large</a></p>

              <h3>uk-button-success</h3>
              <p><a class="uk-button uk-button-round uk-button-success uk-button-small">.uk-button.uk-button-round.uk-button-success.uk-button-small</a>
              <p><a class="uk-button uk-button-round uk-button-success">.uk-button.uk-button-round.uk-button-success</a>
              <p><a class="uk-button uk-button-round uk-button-success uk-button-large">.uk-button.uk-button-round.uk-button-success.uk-button-large</a>
              
              <h3>uk-button-danger</h3>
              <p><a class="uk-button uk-button-round uk-button-danger uk-button-small">.uk-button.uk-button-round.uk-button-danger.uk-button-small</a>
              <p><a class="uk-button uk-button-round uk-button-danger">.uk-button.uk-button-round.uk-button-danger</a>
              <p><a class="uk-button uk-button-round uk-button-danger uk-button-large">.uk-button.uk-button-round.uk-button-danger.uk-button-large</a>
              
              <h3>Button groups</h3>
              <div class="uk-button-group uk-button-round">
                <a href="#" class="uk-button uk-button-primary">Left</a>
                <a href="#" class="uk-button uk-button-secondary">Middle</a>
                <a href="#" class="uk-button uk-button-primary">Right</a>
              </div>
              <ul>
                  <li>
                      .uk-button-group.uk-button-round
                      <ul>
                          <li>> .uk-button x 3 (add the desired style with the above classes)</li>
                      </ul>
                  </li>            
              </ul>

              <h3>Badges</h3>
              <div class="uk-badge-container">
                  <span class="uk-badge">span.uk-badge</span>
                  <span class="uk-badge uk-badge-notification">
                   span.uk-badge.uk-badge-notification
                  </span>
                  <span class="uk-badge uk-badge-success">
                    span.uk-badge.uk-badge-success
                  </span>
                  <span class="uk-badge uk-badge-warning">
                    span.uk-badge.uk-badge-warning
                  </span>
                  <span class="uk-badge uk-badge-danger">
                    span.uk-badge.uk-badge-danger
                  </span>
              </div>
            </div>
          </div>
    </div>
</div>


<div class="padding-verti" id="s-5">
    <div class="uk-container uk-container-center">
        <h2 class="uk-text-center">5. Lists</h2>
        <div class="uk-grid">
            <div class="uk-width-medium-1-3">
              <h3>Normal list</h3>
                <ul>
                    <li>Normal list</li>
                    <li>Normal list</li>
                    <li>Normal list</li>
                </ul>
            </div>
            <div class="uk-width-medium-1-3">
              <h3>Unstyled list</h3>
                <ul class="uk-list">
                    <li>ul.uk-list</li>
                    <li>ul.uk-list</li>
                    <li>ul.uk-list</li>
                </ul>
            </div>
          </div>
          <div class="uk-grid">
            <div class="uk-width-medium-1-3">
              <h3>Bordered list</h3>
                <ul class="uk-list uk-list-line">
                    <li>.uk-list.uk-list-line</li>
                    <li>.uk-list.uk-list-line</li>
                    <li>.uk-list.uk-list-line</li>
                </ul>
            </div> 
            <div class="uk-width-medium-1-3">

              <h3>Striped list</h3>
                <ul class="uk-list uk-list-striped">
                    <li>.uk-list.uk-list-striped</li>
                    <li>.uk-list.uk-list-striped</li>
                    <li>.uk-list.uk-list-striped</li>
                </ul>
            </div>
          </div>
          <div class="uk-grid">
            <div class="uk-width-medium-1-3">
              <h3>Ordered list</h3>
                <ol>
                    <li>Ordered list</li>
                    <li>Ordered list</li>
                    <li>Ordered list</li>
                </ol>
            </div>
              <div class="uk-width-medium-1-3">
                <h3>Pagination</h3>
                  <ul class="uk-pagination">
                      <li><a href="">&lsaquo;</a></li>
                      <li class="uk-active"><span>1</span></li>
                      <li class="uk-disabled"><span>2</span></li>
                      <li><span>&rsaquo;</span></li>
                  </ul>
              </div>
          </div>
          <div class="uk-grid">
            <div class="uk-width-medium-1-3">
              <dl class="uk-description-list-horizontal">
                  <dt>Description list</dt>
                  <dd>.uk-description-list-horizontal</dd>
                  <dt>Description list</dt>
                  <dd>.uk-description-list-horizontal</dd>
              </dl>
            </div>
            <div class="uk-width-medium-1-3">
              <dl class="uk-description-list-line">
                  <dt>Description list</dt>
                  <dd>.uk-description-list-line</dd>
                  <dt>Description list</dt>
                  <dd>.uk-description-list-line</dd>
              </dl>
            </div>
          </div>

        
        <div class="uk-grid">
            <div class="uk-width-medium-1-3">
              <h3>Dropdown</h3>
              <div id="dropdown-parent" class="uk-button-group uk-button-round">

                <!-- This is a button -->
                <button class="uk-button uk-button-primary">.uk-button.uk-button-primary</button>

                <!-- This is the container enabling the JavaScript -->
                <div data-uk-dropdown="{mode:'click', justify:'#dropdown-parent'}">

                    <!-- This is the button toggling the dropdown -->
                    <a href="" class="uk-button uk-button-primary"><i class="uk-icon-caret-down"></i></a>

                    <!-- This is the dropdown -->
                    <div class="uk-dropdown">
                        <ul class="uk-nav uk-nav-dropdown">
                            <li><a href="http://getuikit.com/docs/dropdown.html">Multiple possibilities: have a look here</a></li>
                            <li><a href="http://getuikit.com/docs/dropdown.html">Multiple possibilities: have a look here</a></li>
                            <li><a href="http://getuikit.com/docs/dropdown.html">Multiple possibilities: have a look here</a></li>
                        </ul>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>

<div class="padding-verti" id="s-6">
    <div class="uk-container uk-container-center">
      <div class="uk-grid">
        <div class="uk-width-medium-2-3">
            <h2 class="uk-text-center">6. Forms</h2>
            <div class="padding-verti">
                <h3 class="uk-text-center">Form styles</h3> 
                    Note: tous les inputs html5 ne sont pas supportés par tous les navigateurs. A utiliser avec conscience.
                    <p> Certains éléments sont expliqués ici mais le plus simple est d'aller jeter également un oeil sur la <a href="http://getuikit.com/docs/form.html">doc uikit</a></p>
                <p class="uk-alert">Ajouter d'office une class "uk-form" au formulaire:</p>
                <form class="uk-form" role="form">
                    <div class="uk-form-row">
                        <label class="uk-form-label" for="id-12">Text</label>

                        <input type="text" id="id-12" placeholder="input">
                        <input type="text" id="id-12b" placeholder="input">
                        <label class="uk-margin-small-top"><input type="checkbox"> Checkbox</label>
                    </div>
                </form>
                <div class="uk-alert">
                    <p>form.uk-form-stacked: place le label au-dessus de l'input</p>
                    <p>Dans le formulaire: div.uk-form-row: Ajoute un margin sous chaque item:</p>
                </div>
                <form class="uk-form uk-form-stacked" role="form">
                    <div class="uk-form-row">
                        <label class="uk-form-label" for="id-12">Text</label>

                        <input type="text" id="id-12" class="uk-width-1-1" placeholder="input.uk-width-1-1">
                    </div>
                </form>
                <p class="uk-alert">Ajouter .uk-form-horizontal pour afficher les labels et inputs côte-à-côte:</p>
               

                <form class="uk-form uk-form-horizontal" role="form">
                    <div class="uk-form-row">
                        <label class="uk-form-label" for="id-12">Text</label>
                        <input type="text" id="id-12" placeholder="input">                    
                    </div>
                    <div class="uk-form-row">
                        <span class="uk-form-label">Radio input</span>
                        <div class="uk-form-controls uk-form-controls-text">
                            <input type="radio" id="form-h-r" name="radio"> <label for="form-h-r">Radio input</label><br>
                            <input type="radio" id="form-h-r1" name="radio"> <label for="form-h-r1">1</label>
                            <label><input type="radio" name="radio"> 2</label>
                            <label><input type="radio" name="radio"> 3</label>
                        </div>
                    </div>
                    <div class="uk-form-row">
                        <span class="uk-form-label">Checkbox input</span>
                        <div class="uk-form-controls uk-form-controls-text">
                            <input type="checkbox" id="form-h-c"> <label for="form-h-c">Checkbox input</label><br>
                            <input type="checkbox" id="form-h-c1"> <label for="form-h-c1">1</label>
                            <label><input type="checkbox"> 2</label>
                            <label><input type="checkbox"> 3</label>
                        </div>
                    </div>
                </form>
            </div>

            <hr />

            <div class="padding-verti">
                <h3 class="uk-text-center">Input types</h3> 

                <form class="uk-form uk-form-stacked" role="form">
                    Note: tous les inputs html5 ne sont pas supportés par tous les navigateurs. A utiliser avec conscience.
                    <div class="uk-form-row">
                        <label class="uk-form-label" for="id-12">Text</label>
                        <input type="text" id="id-12" class="uk-width-1-1" placeholder="input.uk-width-1-1">
                    </div>

                    <div class="uk-form-row">
                        <label class="uk-form-label" for="id-13">Email</label>
                        <input type="email" id="id-13" class="uk-width-1-1" placeholder="input.uk-width-1-1">
                    </div>

                    <div class="uk-form-row">
                        <label class="uk-form-label" for="id-14">URL</label>
                        <input type="url" id="id-14" class="uk-width-1-1" placeholder="input.uk-width-1-1">
                    </div>

                    <div class="uk-form-row">
                        <label class="uk-form-label" for="id-15">Password</label>
                        <input type="password" id="id-15" class="uk-width-1-1" placeholder="input.uk-width-1-1">
                    </div>
                    
                    <div class="uk-form-row">
                        <label class="uk-form-label" for="id-16">Search</label>
                        <input type="search" id="id-16" class="uk-width-1-1" placeholder="input.uk-width-1-1">
                    </div>
                    
                    <div class="uk-form-row">
                        <label class="uk-form-label" for="id-17">Number</label>
                        <input type="number" id="id-17" class="uk-width-1-1" placeholder="input.uk-width-1-1">
                    </div>
                    
                    <div class="uk-form-row">
                        <label class="uk-form-label" for="id-18">Tel</label>
                        <input type="tel" id="id-18" class="uk-width-1-1" placeholder="input.uk-width-1-1">
                    </div>
                    
                    <div class="uk-form-row">
                        <label class="uk-form-label" for="id-19">Datetime</label>
                        <input type="datetime" id="id-19" class="uk-width-1-1" placeholder="input.uk-width-1-1">
                    </div>
                    
                    <div class="uk-form-row">
                        <label class="uk-form-label" for="id-20">Date</label>
                         (Le style peut peut-être varier en fonction des navigateurs)
                        <input type="date" id="id-20" class="uk-width-1-1" placeholder="input.uk-width-1-1">
                    </div>
                    
                    <div class="uk-form-row">
                        <label class="uk-form-label" for="id-21">Time</label>
                         (Le style peut peut-être varier en fonction des navigateurs)
                        <input type="time" id="id-21" class="uk-width-1-1" placeholder="input.uk-width-1-1">
                    </div>
                    
                    <div class="uk-form-row">
                        <label class="uk-form-label" for="id-22">Month</label>
                        (Le style peut peut-être varier en fonction des navigateurs)
                        <input type="month" id="id-22" class="uk-width-1-1" placeholder="input.uk-width-1-1">
                    </div>
                    
                    <div class="uk-form-row">
                        <label class="uk-form-label" for="id-23">Week</label>
                         (Le style peut peut-être varier en fonction des navigateurs)
                        <input type="week" id="id-23" class="uk-width-1-1" placeholder="input.uk-width-1-1">
                    </div>
                    
                    <div class="uk-form-row">
                        <label class="uk-form-label" for="id-24">Range</label>
                        (Le style peut peut-être varier en fonction des navigateurs)
                        <input type="range" id="id-24" class="uk-width-1-1" placeholder="input.uk-width-1-1">
                    </div>
                    
                    <div class="uk-form-row">
                        <label class="uk-form-label" for="id-25">color</label>
                        <input type="color" id="id-25" placeholder="input">
                    </div>
                    
                    <div class="uk-form-row">
                        <label class="uk-form-label" for="id-26">Textarea</label>
                        <textarea class="uk-width-1-1" id="id-26">textarea.uk-width-1-1</textarea> <br />
                    </div>
                    
                    <div class="uk-margin">                   
                      <div class="uk-form-row">
                        <label class="uk-form-label">Select</label> 

                        <div class="uk-form-select" data-uk-form-select>
                          <span class="uk-select"></span>
                          <select name="name"><option selected='selected' value="0">---</option><option value="application">Application</option>
                            <option value="concours">Concours</option>
                            <option value="coupon">Coupon</option>
                            <option value="promotion">Promotion</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="uk-form-row">
                        <div class="uk-margin">
                            <label class="uk-form-label">Select</label> 

                            <div class="uk-button uk-button-primary uk-button-round uk-form-select" data-uk-form-select>
                                <span></span>
                                <i class="uk-icon-caret-down"></i>
                                <select>
                                    <option value="1">Option 01</option>
                                    <option value="2">Option 02</option>
                                    <option value="3">Option 03</option>
                                    <option value="4">Option 04</option>
                                </select>
                            </div>
                            <ul>
                                <li>.uk-button.uk-button-primary.uk-button-round.uk-form-select[data-uk-form-select]
                                    <ul>
                                        <li>
                                            > span >i.uk-icon-caret-down
                                        </li>
                                        <li>
                                            select
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            (More info <a href="http://getuikit.com/docs/addons_form-select.html">Here</a>)

                        </div>
                    </div>
                    <br />
                </form>

                <form class="uk-form" role="form">
                    <div class="uk-form-row">
                        <fieldset>
                          <legend>Radio</legend>
                          <input type="radio" id="radio" name="radio"> <label for="form-h-r">Radio input</label><br>
                          <input type="radio" id="radio2" name="radio"> <label for="form-h-r">Radio input</label><br>

                        </fieldset>
                    </div>
                    <div class="uk-form-row">
                        <fieldset>
                          <legend>Checkbox</legend>
                          <input type="checkbox" id="checkbox" name="checkbox"> <label for="form-h-r">checkbox input</label><br>
                          <input type="checkbox" id="checkbox2" name="checkbox"> <label for="form-h-r">checkbox input</label><br>
                        </fieldset>
                    </div>
                    <div class="uk-form-row">
                        <div class="uk-form-file">
                            <button class="uk-button uk-button-primary uk-button-round">Upload file</button>
                            <input type="file">
                        </div>
                        <div class="uk-form-file">Text<input type="file"></div>
                        .uk-form-file > .uk-button + input type file
                    </div>
                    (More info <a href="http://getuikit.com/docs/addons_form-file.html">Here</a>)
                </form>
            </div>

            <hr />

            <div class="padding-verti">
                <h3 class="uk-text-center">Input styles</h3>
                <form class="uk-form" role="form">
                    <div class="uk-form-row">
                        <input type="text" class="uk-form-small" id="id45" placeholder="input.uk-form-small">
                    </div>
                    <div class="uk-form-row">
                        <input type="text" id="id44" placeholder="default">
                    </div>
                    <div class="uk-form-row">
                        <input type="text" class="uk-form-large" id="id45b" placeholder="input.uk-form-large">
                    </div>
                    <div class="uk-form-row">
                        <input type="text" class="uk-form-width-mini" id="id45c" placeholder="input.uk-form-width-mini">
                    </div>
                    <div class="uk-form-row">
                        <input type="text" class="uk-form-width-small" id="id45cc" placeholder="input.uk-form-width-small">
                    </div>
                    <div class="uk-form-row">
                        <input type="text" class="uk-form-width-medium" id="id45d" placeholder="input.uk-form-width-medium">
                    </div>
                    <div class="uk-form-row">
                        <input type="text" class="uk-form-width-large" id="id45e" placeholder="input.uk-form-width-large">
                    </div>
                    <div class="uk-form-row">
                        <input type="text" class="uk-width-1-1" id="id44" placeholder="input.uk-width-1-1">
                    </div>
                    <div class="uk-form-row">
                        <div class="uk-form-icon">
                          <i class="uk-icon-envelope"></i>
                            <input type="text" class="uk-width-1-1"  placeholder=".uk-form-icon > i.uk-icon-calendar + input">
                        </div>
                    </div>
                </form>             
            </div>
            
            <hr />          
          
            <div class="padding-verti">
                <h3 class="uk-text-center">Input alerts</h3>
                <form class="uk-form" role="form">
                    <input type="text" placeholder=".uk-form-danger" class="uk-form-danger">
                    <input type="text" placeholder=".uk-form-success" class="uk-form-success">
                </form>
            </div>

            <hr />
        </div>
      </div>
    </div>
  </div>
  <div class="padding-verti" id="s-7" style="background: #fff;">
    <div class="uk-container uk-container-center">
      <div class="uk-grid">
        <div class="uk-width-medium-2-3">
          <h2 class="uk-text-center">7. Tables</h2>
            <div class="uk-overflow-container">
                <table class="uk-table">
                    <caption>.uk-overflow-container > table.uk-table</caption>
                    <thead>
                        <tr>
                            <th>Table header</th>
                            <th>Table header</th>
                            <th>Table header</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <td>Table Footer</td>
                            <td>Table Footer</td>
                            <td>Table Footer</td>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>Table Data</td>
                            <td>Table Data</td>
                            <td>Table Data</td>
                        </tr>
                        <tr>
                            <td>Table Data</td>
                            <td>Table Data</td>
                            <td>Table Data</td>
                        </tr>
                        <tr>
                            <td>Table Data</td>
                            <td>Table Data</td>
                            <td>Table Data</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <h3>Table with hover effect</h3>
          
            <div class="uk-overflow-container">
                <table class="uk-table uk-table-hover">
                    <caption>.uk-overflow-container > table.uk-table.uk-table-hover</caption>
                    <thead>
                        <tr>
                            <th>Table header</th>
                            <th>Table header</th>
                            <th>Table header</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <td>Table Footer</td>
                            <td>Table Footer</td>
                            <td>Table Footer</td>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>Table Data</td>
                            <td>Table Data</td>
                            <td>Table Data</td>
                        </tr>
                        <tr>
                            <td>Table Data</td>
                            <td>Table Data</td>
                            <td>Table Data</td>
                        </tr>
                        <tr>
                            <td>Table Data</td>
                            <td>Table Data</td>
                            <td>Table Data</td>
                        </tr>
                    </tbody>
                </table>
            </div>

            <h3>Striped table</h3>
          
            <div class="uk-overflow-container">
                <table class="uk-table uk-table-striped">
                    <caption>.uk-overflow-container > table.uk-table.uk-table-striped</caption>
                    <thead>
                        <tr>
                            <th>Table header</th>
                            <th>Table header</th>
                            <th>Table header</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <td>Table Footer</td>
                            <td>Table Footer</td>
                            <td>Table Footer</td>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>Table Data</td>
                            <td>Table Data</td>
                            <td>Table Data</td>
                        </tr>
                        <tr>
                            <td>Table Data</td>
                            <td>Table Data</td>
                            <td>Table Data</td>
                        </tr>
                        <tr>
                            <td>Table Data</td>
                            <td>Table Data</td>
                            <td>Table Data</td>
                        </tr>
                    </tbody>
                </table>
            </div>
          <hr />
          <h3>Others</h3>
          
            <div class="uk-overflow-container">
                <table class="uk-table uk-table-condensed">
                    <caption>.uk-overflow-container > table.uk-table.uk-table-condensed</caption>
                    <thead>
                        <tr>
                            <th>Table header</th>
                            <th>Table header</th>
                            <th>Table header</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <td>Table Footer</td>
                            <td>Table Footer</td>
                            <td>Table Footer</td>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>Table Data</td>
                            <td>Table Data</td>
                            <td>Table Data</td>
                        </tr>
                        <tr>
                            <td>Table Data</td>
                            <td>Table Data</td>
                            <td>Table Data</td>
                        </tr>
                        <tr>
                            <td>Table Data</td>
                            <td>Table Data</td>
                            <td>Table Data</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
      </div>

    </div>
</div>

<div class="padding-verti" id="s-8">
    <div class="uk-container uk-container-center">
      <div class="uk-grid">
        <div class="uk-width-medium-2-3">
            <h2 class="uk-text-center">8. Messages & Alerts</h2>
      
            <div class="uk-alert" data-uk-alert="">
                <a href="" class="uk-alert-close uk-close"></a>
                <p>.uk-alert</p>
            </div> 
            <div class="uk-alert uk-alert-success" data-uk-alert="">
                <a href="" class="uk-alert-close uk-close"></a>
                <p>.uk-alert.uk-alert-success</p>
            </div> 
            <div class="uk-alert uk-alert-warning" data-uk-alert="">
                <a href="" class="uk-alert-close uk-close"></a>
                <p>.uk-alert.uk-alert-warning</p>
            </div> 
            <div class="uk-alert uk-alert-danger" data-uk-alert="">
                <a href="" class="uk-alert-close uk-close"></a>
                <p>.uk-alert.uk-alert-danger</p>
            </div>   
        </div>
    </div>
      
</div>


<div class="padding-verti" id="s-9">
    <div class="uk-container uk-container-center">        
        <div class="uk-grid">
            <div class="uk-width-medium-2-3">
                <h2 class="uk-text-center">9. Grid</h2>
                    <article class="uk-article">

                    <p class="uk-article-lead">Create a fully responsive, fluid and nestable grid layout.</p>

                    <p>The grid system of UIkit follows the mobile-first approach and accomodates up to 10 grid columns. It uses units with predefined classes inside each grid, which define the column width. It is also possible to combine the grid with classes from the <a href="addons_flex.html">Flex component</a>, although it works only in modern browsers.</p>

                    <hr class="uk-article-divider">

                    <h3 id="usage">Usage</h3>

                    <p>To create the grid container, add the <code>.uk-grid</code> class to a parent element. Add one of the <code>.uk-width-*</code> classes to child elements to determine, how the units shall be sized. The grid supports 1, 2, 3, 4, 5, 6 and 10 unit divisions. This table gives you an overview of the <code>uk-width-*</code> classes that can be applied to units.</p>

                    <div class="uk-overflow-container">
                        <table class="uk-table uk-text-nowrap">
                            <thead>
                                <tr>
                                    <th>Class</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><code>.uk-width-1-1</code></td>
                                    <td>Fills 100% of the available width.</td>
                                </tr>
                                <tr>
                                    <td><code>.uk-width-1-2</code></td>
                                    <td>Divides the grid into halves.</td>
                                </tr>
                                <tr>
                                    <td><code>.uk-width-1-3</code> to <code>.uk-width-2-3</code></td>
                                    <td>Divides the grid into thirds.</td>
                                </tr>
                                <tr>
                                    <td><code>.uk-width-1-4</code> to <code>.uk-width-3-4</code></td>
                                    <td>Divides the grid into fourths.</td>
                                </tr>
                                <tr>
                                    <td><code>.uk-width-1-5</code> to <code>.uk-width-4-5</code></td>
                                    <td>Divides the grid into fifths.</td>
                                </tr>
                                <tr>
                                    <td><code>.uk-width-1-6</code> to <code>.uk-width-5-6</code></td>
                                    <td>Divides the grid into sixths.</td>
                                </tr>
                                <tr>
                                    <td><code>.uk-width-1-10</code> to <code>.uk-width-9-10</code></td>
                                    <td>Divides the grid into tenths.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <p>We built an intentional redundancy into each set of unit classes, so that for instance the <code>.uk-width-5-10</code> class will work just as well as <code>.uk-width-1-2</code>.</p>

                    <h4 class="tm-article-subtitle">Example</h4>

                    <p>Take a closer look at the following grid example, which gives you a great overwiew of all basic <code>.uk-width-*</code> classes.</p>

                    <div class="tm-grid-truncate uk-text-center">

                        <div class="uk-grid">
                            <div class="uk-width-1-3"><div class="uk-panel uk-panel-box uk-panel-bordered"><code>.uk-width-1-3</code></div></div>
                            <div class="uk-width-1-3"><div class="uk-panel uk-panel-box uk-panel-bordered"><code>.uk-width-1-3</code></div></div>
                            <div class="uk-width-1-3"><div class="uk-panel uk-panel-box uk-panel-bordered"><code>.uk-width-1-3</code></div></div>
                        </div>

                        <div class="uk-grid">
                            <div class="uk-width-1-2"><div class="uk-panel uk-panel-box uk-panel-bordered"><code>.uk-width-1-2</code></div></div>
                            <div class="uk-width-1-2"><div class="uk-panel uk-panel-box uk-panel-bordered"><code>.uk-width-1-2</code></div></div>
                        </div>

                        <div class="uk-grid">
                            <div class="uk-width-3-10"><div class="uk-panel uk-panel-box uk-panel-bordered"><code>.uk-width-3-10</code></div></div>
                            <div class="uk-width-7-10"><div class="uk-panel uk-panel-box uk-panel-bordered"><code>.uk-width-7-10</code></div></div>
                        </div>

                    </div>

                    <p><span class="uk-badge">NOTE</span> The grid has no style related CSS. In our example we used panels from the <a href="panel.html">Panel component</a>.</p>

                    <h4 class="tm-article-subtitle">Markup</h4>

                    <p>Here is a simple code example of how the default grid with 2 columns would look like:</p>

                    <pre><code class="xml"><span class="tag">&lt;<span class="title">div</span> <span class="attribute">class</span>=<span class="value">"uk-grid"</span>&gt;</span>
                        <span class="tag">&lt;<span class="title">div</span> <span class="attribute">class</span>=<span class="value">"uk-width-1-2"</span>&gt;</span>...<span class="tag">&lt;/<span class="title">div</span>&gt;</span>
                        <span class="tag">&lt;<span class="title">div</span> <span class="attribute">class</span>=<span class="value">"uk-width-1-2"</span>&gt;</span>...<span class="tag">&lt;/<span class="title">div</span>&gt;</span>
                    <span class="tag">&lt;/<span class="title">div</span>&gt;</span></code></pre>

                    <hr class="uk-article-divider">

                    <h3 id="responsive-width">Responsive width</h3>

                    <p>UIkit provides a number of very useful responsive widths classes. Basicall they work just like the usual width classes, except they are prefixed, so that they only come to effect at certain breakpoints. These classes can be combined with the visibility classes from the <a href="utility.html">Utility component</a>. This is great to adjust your layout and content for different device sizes.</p>

                    <div class="uk-overflow-container">
                        <table class="uk-table uk-text-nowrap">
                            <thead>
                                <tr>
                                    <th>Class</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><code>.uk-width-*</code></td>
                                    <td>Affects all device widths, grid columns stay side by side.</td>
                                </tr>
                                <tr>
                                    <td><code>.uk-width-small-*</code></td>
                                    <td>Affects device widths of <em>480px</em> and higher. Grid columns will stack on smaller sizes.</td>
                                </tr>
                                <tr>
                                    <td><code>.uk-width-medium-*</code></td>
                                    <td>Affects device widths of <em>768px</em> and higher. Grid columns will stack on smaller sizes.</td>
                                </tr>
                                <tr>
                                    <td><code>.uk-width-large-*</code></td>
                                    <td>Affects device widths of <em>960px</em> and higher. Grid columns will stack on smaller sizes.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <p><span class="uk-badge uk-badge-danger">IMPORTANT</span> To create a margin between stacking grid columns, just add the <code>data-uk-grid-margin</code> attribute.</p>

                    <h4 class="tm-article-subtitle">Example</h4>

                    <div class="tm-grid-truncate uk-text-center">
                        <div class="uk-grid" data-uk-grid-margin="">
                            <div class="uk-width-large-1-3 uk-width-medium-1-2"><div class="uk-panel uk-panel-box uk-panel-bordered uk-panel-box uk-panel-bordered-primary"><code>.uk-width-medium-1-2</code> <code>.uk-width-large-1-3</code></div></div>
                            <div class="uk-width-large-1-3 uk-hidden-medium"><div class="uk-panel uk-panel-box uk-panel-bordered"><code>.uk-hidden-medium</code> <code>.uk-width-large-1-3</code></div></div>
                            <div class="uk-width-large-1-3 uk-width-medium-1-2"><div class="uk-panel uk-panel-box uk-panel-bordered uk-panel-box uk-panel-bordered-primary"><code>.uk-width-medium-1-2</code> <code>.uk-width-large-1-3</code></div></div>
                        </div>

                        <div class="uk-grid" data-uk-grid-margin="">
                            <div class="uk-width-medium-1-3 uk-width-1-2"><div class="uk-panel uk-panel-box uk-panel-bordered uk-panel-box uk-panel-bordered-secondary"><code>.uk-width-1-2</code> <code>.uk-width-medium-1-3</code></div></div>
                            <div class="uk-width-medium-1-3 uk-hidden-small"><div class="uk-panel uk-panel-box uk-panel-bordered"><code>.uk-hidden-small</code> <code>.uk-width-medium-1-3</code></div></div>
                            <div class="uk-width-medium-1-3 uk-width-1-2"><div class="uk-panel uk-panel-box uk-panel-bordered uk-panel-box uk-panel-bordered-secondary"><code>.uk-width-1-2</code> <code>.uk-width-medium-1-3</code></div></div>
                        </div>

                        <div class="uk-grid" data-uk-grid-margin="">
                            <div class="uk-width-1-1 uk-visible-small"><div class="uk-panel uk-panel-box uk-panel-bordered uk-panel-box uk-panel-bordered-secondary"><code>.uk-width-1-1 .uk-visible-small</code></div></div>
                            <div class="uk-width-medium-1-1 uk-visible-medium"><div class="uk-panel uk-panel-box uk-panel-bordered uk-panel-box uk-panel-bordered-primary"><code>.uk-width-medium-1-1 .uk-visible-medium</code></div></div>
                            <div class="uk-width-large-1-1 uk-visible-large"><div class="uk-panel uk-panel-box uk-panel-bordered uk-panel-box uk-panel-bordered"><code>.uk-width-large-1-1 .uk-visible-large</code></div></div>
                        </div>
                    </div>

                    <hr class="uk-article-divider">

                    <h3 id="grid-gutter">Grid gutter</h3>

                    <p>Grids automatically create a horizontal gutter between columns and a vertical one between two succeeding grids. By default, the grid gutter is wider on large screens. To avoid this behavior and preserve the originial spacing, just add the <code>.uk-grid-preserve</code> class.</p>

                    <h4 class="tm-article-subtitle">Example</h4>

                    <div class="uk-grid uk-grid-preserve">
                        <div class="uk-width-1-3"><div class="uk-panel uk-panel-box uk-panel-bordered uk-panel-box uk-panel-bordered-primary">Lorem ipsum</div></div>
                        <div class="uk-width-1-3"><div class="uk-panel uk-panel-box uk-panel-bordered uk-panel-box uk-panel-bordered-primary">Lorem ipsum</div></div>
                        <div class="uk-width-1-3"><div class="uk-panel uk-panel-box uk-panel-bordered uk-panel-box uk-panel-bordered-primary">Lorem ipsum</div></div>
                    </div>

                    <hr class="uk-article-divider">

                    <h3 id="grid-divider">Grid divider</h3>

                    <p>Add the <code>.uk-grid-divider</code> class to separate grid columns with lines. To separate grids with a horizontal line, just add the class to a <code>&lt;hr&gt;</code> or <code>&lt;div&gt;</code> element.</p>

                    <h4 class="tm-article-subtitle">Example</h4>

                    <div class="tm-grid-truncate uk-grid uk-grid-divider uk-text-center" data-uk-grid-margin="">
                        <div class="uk-width-medium-1-3"><div class="uk-panel uk-panel-box uk-panel-bordered"><code>.uk-width-medium-1-3</code></div></div>
                        <div class="uk-width-medium-1-3"><div class="uk-panel uk-panel-box uk-panel-bordered"><code>.uk-width-medium-1-3</code></div></div>
                        <div class="uk-width-medium-1-3"><div class="uk-panel uk-panel-box uk-panel-bordered"><code>.uk-width-medium-1-3</code></div></div>
                    </div>
                    <hr class="uk-grid-divider">
                    <div class="uk-grid uk-grid-divider uk-text-center" data-uk-grid-margin="">
                        <div class="uk-width-medium-1-3"><div class="uk-panel uk-panel-box uk-panel-bordered"><code>.uk-width-medium-1-3</code></div></div>
                        <div class="uk-width-medium-1-3"><div class="uk-panel uk-panel-box uk-panel-bordered"><code>.uk-width-medium-1-3</code></div></div>
                        <div class="uk-width-medium-1-3"><div class="uk-panel uk-panel-box uk-panel-bordered"><code>.uk-width-medium-1-3</code></div></div>
                    </div>

                    <h4 class="tm-article-subtitle">Markup</h4>

                    <pre><code class="xml"><span class="tag">&lt;<span class="title">div</span> <span class="attribute">class</span>=<span class="value">"uk-grid uk-grid-divider"</span>&gt;</span>...<span class="tag">&lt;/<span class="title">div</span>&gt;</span>
                    <span class="tag">&lt;<span class="title">hr</span> <span class="attribute">class</span>=<span class="value">"uk-grid-divider"</span>&gt;</span>
                    <span class="tag">&lt;<span class="title">div</span> <span class="attribute">class</span>=<span class="value">"uk-grid uk-grid-divider"</span>&gt;</span>...<span class="tag">&lt;/<span class="title">div</span>&gt;</span></code></pre>

                    <p><span class="uk-badge">NOTE</span> The horizontal divider can not be applied to grids with any of the <code>uk-push-*</code> or <code>uk-pull-*</code> classes.</p>

                    <hr class="uk-article-divider">

                    <h3 id="source-ordering">Source ordering</h3>

                    <p>You can change the display order of the columns to keep a specific column order in the source code. Add one of the <code>.uk-push-*</code> classes to move the column to the right and add one of the <code>.uk-pull-*</code> classes to move a column to the left. This allows you for example to flip the columns' display order for wider viewports. The classes can also be used to offset columns, creating additional space between them.</p>

                    <p>Source ordering is useful for SEO and responsive design, because in narrow viewports the grid will be displayed according to the source order of the markup.</p>

                    <p><span class="uk-badge">NOTE</span> This feature only works in combination with one of the <code>.uk-width-medium-*</code> classes.</p>

                    <h4 class="tm-article-subtitle">Example</h4>

                    <div class="uk-grid uk-text-center" data-uk-grid-margin="">
                        <div class="uk-width-medium-1-2 uk-push-1-2"><div class="uk-panel uk-panel-box uk-panel-bordered"><code>.uk-width-medium-1-2 .uk-push-1-2</code></div></div>
                        <div class="uk-width-medium-1-2 uk-pull-1-2"><div class="uk-panel uk-panel-box uk-panel-bordered"><code>.uk-width-medium-1-2 .uk-pull-1-2</code></div></div>
                    </div>

                    <div class="uk-grid uk-text-center" data-uk-grid-margin="">
                        <div class="uk-width-medium-2-5 uk-push-3-5"><div class="uk-panel uk-panel-box uk-panel-bordered"><code>.uk-width-medium-2-5 .uk-push-3-5</code></div></div>
                        <div class="uk-width-medium-2-5 uk-pull-2-5"><div class="uk-panel uk-panel-box uk-panel-bordered"><code>.uk-width-medium-2-5 .uk-pull-2-5</code></div></div>
                    </div>

                    <h4 class="tm-article-subtitle">Markup</h4>

                    <pre><code class="xml"><span class="tag">&lt;<span class="title">div</span> <span class="attribute">class</span>=<span class="value">"uk-grid"</span>&gt;</span>
                        <span class="tag">&lt;<span class="title">div</span> <span class="attribute">class</span>=<span class="value">"uk-width-medium-1-2 uk-push-1-2"</span>&gt;</span>...<span class="tag">&lt;/<span class="title">div</span>&gt;</span>
                        <span class="tag">&lt;<span class="title">div</span> <span class="attribute">class</span>=<span class="value">"uk-width-medium-1-2 uk-pull-1-2"</span>&gt;</span>...<span class="tag">&lt;/<span class="title">div</span>&gt;</span>
                    <span class="tag">&lt;/<span class="title">div</span>&gt;</span></code></pre>

                    <hr class="uk-article-divider">

                    <h3 id="match-column-heights">Match column heights</h3>

                    <p>The Grid component uses Flexbox, so the height of grid columns is matched automatically. To achieve the same effect in older browsers that don't support Flexbox, just add the <code>data-uk-grid-match</code> attribute to your grid. If your grid wraps into multiple rows, only grid columns within the same row are matched. To match grid columns accross all rows just use <code>data-uk-grid-match="{row: false}"</code>.</p><p>

                    </p><h4 class="tm-article-subtitle">Example</h4>

                    <div class="uk-grid uk-grid-divider" data-uk-grid-match="">
                        <div class="uk-width-medium-1-3" style="min-height: 100px;">Lorem ipsum dolor sit amet.</div>
                        <div class="uk-width-medium-1-3" style="min-height: 100px;">Lorem ipsum dolor sit amet.</div>
                        <div class="uk-width-medium-1-3" style="min-height: 100px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</div>
                    </div>

                    <h4 class="tm-article-subtitle">Markup</h4>

                    <pre><code class="xml"><span class="tag">&lt;<span class="title">div</span> <span class="attribute">class</span>=<span class="value">"uk-grid"</span> <span class="attribute">data-uk-grid-match</span>&gt;</span>...<span class="tag">&lt;/<span class="title">div</span>&gt;</span></code></pre>

                    <p><span class="uk-badge">NOTE</span> If grid columns extend to a width of 100%, their heights will no longer be matched. This makes sense, for example, if they stack vertically in narrower viewports.</p>

                    <hr class="uk-article-divider">

                    <h3>Match height of panels</h3>

                    <p>If you want to match the heights of panels in a grid, just add the <code>.uk-grid-match</code> class. When using the data attribute, you need to add the <code>{target:'.uk-panel'}</code> selector.</p>

                    <h4 class="tm-article-subtitle">Example</h4>

                    <div class="uk-grid uk-grid-match" data-uk-grid-match="{target:'.uk-panel'}" data-uk-grid-margin="">
                        <div class="uk-width-medium-1-3">
                            <div class="uk-panel uk-panel-box uk-panel-bordered" style="min-height: 100px;">Lorem ipsum dolor sit amet.</div>
                        </div>
                        <div class="uk-width-medium-1-3">
                            <div class="uk-panel uk-panel-box uk-panel-bordered" style="min-height: 100px;">Lorem ipsum dolor sit amet.</div>
                        </div>
                        <div class="uk-width-medium-1-3">
                            <div class="uk-panel uk-panel-box uk-panel-bordered" style="min-height: 100px;">Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam.</div>
                        </div>
                    </div>

                    <h4 class="tm-article-subtitle">Markup</h4>

                    <pre><code class="xml"><span class="tag">&lt;<span class="title">div</span> <span class="attribute">class</span>=<span class="value">"uk-grid uk-grid-match"</span> <span class="attribute">data-uk-grid-match</span>=<span class="value">"{target:'.uk-panel'}"</span>&gt;</span>
                    <span class="tag">&lt;<span class="title">div</span> <span class="attribute">class</span>=<span class="value">"uk-width-medium-1-3"</span>&gt;</span>
                    <span class="tag">&lt;<span class="title">div</span> <span class="attribute">class</span>=<span class="value">"uk-panel"</span>&gt;</span>...<span class="tag">&lt;/<span class="title">div</span>&gt;</span>
                    <span class="tag">&lt;/<span class="title">div</span>&gt;</span>
                    <span class="tag">&lt;/<span class="title">div</span>&gt;</span></code></pre>

                    <hr class="uk-article-divider">

                    <h3 id="wrap-multiple-rows">Wrap multiple rows</h3>

                    <p>You can also create a grid with as many columns as you want, which automatically break into the next line. Just add the <code>data-uk-grid-margin</code> attribute to create a margin between the grid rows. Typically this layout is built using a <code>&lt;ul&gt;</code> element.</p>

                    <h4 class="tm-article-subtitle">Example</h4>

                    <ul class="uk-grid uk-text-center" data-uk-grid-margin="">
                        <li class="uk-width-medium-1-3"><div class="uk-panel uk-panel-box uk-panel-bordered">Box</div></li>
                        <li class="uk-width-medium-1-3"><div class="uk-panel uk-panel-box uk-panel-bordered">Box</div></li>
                        <li class="uk-width-medium-1-3"><div class="uk-panel uk-panel-box uk-panel-bordered">Box</div></li>
                        <li class="uk-width-medium-1-3 uk-grid-margin"><div class="uk-panel uk-panel-box uk-panel-bordered">Box</div></li>
                        <li class="uk-width-medium-1-3 uk-grid-margin"><div class="uk-panel uk-panel-box uk-panel-bordered">Box</div></li>
                        <li class="uk-width-medium-1-3 uk-grid-margin"><div class="uk-panel uk-panel-box uk-panel-bordered">Box</div></li>
                    </ul>

                    <p><span class="uk-badge">NOTE</span> You can also apply a custom width to your grid columns. Just add the <code>.uk-width</code> class and use an inline style to define the width. This example uses fixed pixel values for the widths as you would do with images.</p>

                    <ul class="uk-grid uk-text-center" data-uk-grid-margin="">
                        <li class="uk-width" style="width: 100px;"><div class="uk-panel uk-panel-box uk-panel-bordered">Box</div></li>
                        <li class="uk-width" style="width: 120px;"><div class="uk-panel uk-panel-box uk-panel-bordered">Box</div></li>
                        <li class="uk-width" style="width: 140px;"><div class="uk-panel uk-panel-box uk-panel-bordered">Box</div></li>
                        <li class="uk-width" style="width: 160px;"><div class="uk-panel uk-panel-box uk-panel-bordered">Box</div></li>
                        <li class="uk-width" style="width: 180px;"><div class="uk-panel uk-panel-box uk-panel-bordered">Box</div></li>
                        <li class="uk-width uk-grid-margin" style="width: 200px;"><div class="uk-panel uk-panel-box uk-panel-bordered">Box</div></li>
                        <li class="uk-width uk-grid-margin" style="width: 220px;"><div class="uk-panel uk-panel-box uk-panel-bordered">Box</div></li>
                        <li class="uk-width uk-grid-margin" style="width: 240px;"><div class="uk-panel uk-panel-box uk-panel-bordered">Box</div></li>
                    </ul>

                    <h4 class="tm-article-subtitle">Markup</h4>

                    <pre><code class="xml"><span class="tag">&lt;<span class="title">ul</span> <span class="attribute">class</span>=<span class="value">"uk-grid"</span> <span class="attribute">data-uk-grid-margin</span>&gt;</span>

                        <span class="comment">&lt;!-- These elements have a width in percent --&gt;</span>
                        <span class="tag">&lt;<span class="title">li</span> <span class="attribute">class</span>=<span class="value">"uk-width-medium-1-5"</span>&gt;</span>...<span class="tag">&lt;/<span class="title">li</span>&gt;</span>
                        <span class="tag">&lt;<span class="title">li</span> <span class="attribute">class</span>=<span class="value">"uk-width-medium-3-10"</span>&gt;</span>...<span class="tag">&lt;/<span class="title">li</span>&gt;</span>

                        <span class="comment">&lt;!-- These elements have a width in pixel --&gt;</span>
                        <span class="tag">&lt;<span class="title">li</span> <span class="attribute">class</span>=<span class="value">"uk-width"</span> <span class="attribute">style</span>=<span class="value">"width: 100px;"</span>&gt;</span>...<span class="tag">&lt;/<span class="title">li</span>&gt;</span>
                        <span class="tag">&lt;<span class="title">li</span> <span class="attribute">class</span>=<span class="value">"uk-width"</span> <span class="attribute">style</span>=<span class="value">"width: 150px;"</span>&gt;</span>...<span class="tag">&lt;/<span class="title">li</span>&gt;</span>

                    <span class="tag">&lt;/<span class="title">ul</span>&gt;</span></code></pre>

                    <hr class="uk-article-divider">

                    <h3 id="even-grid-columns">Even grid columns</h3>

                    <p>To create a grid whose child elements' widths are evenly split, you don't have to apply the same class to each list item within the grid. Just add one of the <code>.uk-grid-width-*</code> classes to the grid itself.</p>

                    <div class="uk-overflow-container">
                        <table class="uk-table uk-text-nowrap">
                            <thead>
                                <tr>
                                    <th>Class</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><code>.uk-grid-width-1-2</code></td>
                                    <td>Divides the grid into halves.</td>
                                </tr>
                                <tr>
                                    <td><code>.uk-grid-width-1-3</code></td>
                                    <td>Divides the grid into thirds.</td>
                                </tr>
                                <tr>
                                    <td><code>.uk-grid-width-1-4</code></td>
                                    <td>Divides the grid into fourths.</td>
                                </tr>
                                <tr>
                                    <td><code>.uk-grid-width-1-5</code></td>
                                    <td>Divides the grid into fifths.</td>
                                </tr>
                                <tr>
                                    <td><code>.uk-grid-width-1-6</code></td>
                                    <td>Divides the grid into sixths.</td>
                                </tr>
                                <tr>
                                    <td><code>.uk-grid-width-1-10</code></td>
                                    <td>Divides the grid into tenths.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h4 class="tm-article-subtitle">Example</h4>

                    <ul class="uk-grid uk-grid-width-1-5 uk-text-center">
                        <li><div class="uk-panel uk-panel-box uk-panel-bordered">Box</div></li>
                        <li><div class="uk-panel uk-panel-box uk-panel-bordered">Box</div></li>
                        <li><div class="uk-panel uk-panel-box uk-panel-bordered">Box</div></li>
                        <li><div class="uk-panel uk-panel-box uk-panel-bordered">Box</div></li>
                        <li><div class="uk-panel uk-panel-box uk-panel-bordered">Box</div></li>
                    </ul>

                    <h4 class="tm-article-subtitle">Markup</h4>

                    <pre><code class="xml"><span class="tag">&lt;<span class="title">ul</span> <span class="attribute">class</span>=<span class="value">"uk-grid uk-grid-width-1-5"</span>&gt;</span>
                        <span class="tag">&lt;<span class="title">li</span>&gt;</span>...<span class="tag">&lt;/<span class="title">li</span>&gt;</span>
                        <span class="tag">&lt;<span class="title">li</span>&gt;</span>...<span class="tag">&lt;/<span class="title">li</span>&gt;</span>
                    <span class="tag">&lt;/<span class="title">ul</span>&gt;</span></code></pre>

                    <hr class="uk-article-divider">

                    <h3>Responsive width</h3>

                    <p>UIkit also provides responsive grid width classes. You can apply these to maintain evenly sized grid columns, regardless of the device width.</p>

                    <div class="uk-overflow-container">
                        <table class="uk-table uk-text-nowrap">
                            <thead>
                                <tr>
                                    <th>Class</th>
                                    <th>Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><code>.uk-grid-width-*</code></td>
                                    <td>Affects all device widths.</td>
                                </tr>
                                <tr>
                                    <td><code>.uk-grid-width-small-*</code></td>
                                    <td>Affects device widths of <em>480px</em> and higher.</td>
                                </tr>
                                <tr>
                                    <td><code>.uk-grid-width-medium-*</code></td>
                                    <td>Affects device widths of <em>768px</em> and higher.</td>
                                </tr>
                                <tr>
                                    <td><code>.uk-grid-width-large-*</code></td>
                                    <td>Affects device widths of <em>960px</em> and higher.</td>
                                </tr>
                                <tr>
                                    <td><code>.uk-grid-width-xlarge-*</code></td>
                                    <td>Affects device widths of <em>1220px</em> and higher.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h4 class="tm-article-subtitle">Example</h4>

                    <ul class="uk-grid uk-grid-width-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-5 uk-text-center" data-uk-grid-margin="">
                        <li><div class="uk-panel uk-panel-box uk-panel-bordered">Box</div></li>
                        <li><div class="uk-panel uk-panel-box uk-panel-bordered">Box</div></li>
                        <li><div class="uk-panel uk-panel-box uk-panel-bordered">Box</div></li>
                        <li><div class="uk-panel uk-panel-box uk-panel-bordered">Box</div></li>
                        <li><div class="uk-panel uk-panel-box uk-panel-bordered">Box</div></li>
                    </ul>

                    <h4 class="tm-article-subtitle">Markup</h4>

                    <pre><code class="xml"><span class="tag">&lt;<span class="title">ul</span> <span class="attribute">class</span>=<span class="value">"uk-grid uk-grid-width-1-2 uk-grid-width-medium-1-3 uk-grid-width-large-1-5"</span>&gt;</span>
                        <span class="tag">&lt;<span class="title">li</span>&gt;</span>...<span class="tag">&lt;/<span class="title">li</span>&gt;</span>
                        <span class="tag">&lt;<span class="title">li</span>&gt;</span>...<span class="tag">&lt;/<span class="title">li</span>&gt;</span>
                    <span class="tag">&lt;/<span class="title">ul</span>&gt;</span></code></pre>

                 </article>
            </div>
        </div>
    </div>

</div>

<div class="padding-verti" id="s-10">
    <div class="uk-container uk-container-center">
        <div class="uk-grid">
            <div class="uk-width-medium-2-3">

                <article class="uk-article">

                    <h2 class="uk-text-center">10. Text utilities</h2>

                    <p class="uk-article-lead">A collection of useful text utility classes to style your content.</p>

                    <h3 id="text-styles">Text styles</h3>

                    <p>UIkit offers various text utlities to style your text. </p>

                    <div class="uk-overflow-container">
                        <table class="uk-table uk-table-condensed uk-text-nowrap">
                            <thead>
                                <tr>
                                    <th class="uk-width-1-4">Class</th>
                                    <th class="uk-width-3-4">Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><code>.uk-text-small</code></td>
                                    <td><span class="uk-text-small">Add this class to decrease the font size.</span></td>
                                </tr>
                                <tr>
                                    <td><code>.uk-text-large</code></td>
                                    <td><span class="uk-text-large">Add this class to increase the font size.</span></td>
                                </tr>
                                <tr>
                                    <td><code>.uk-text-bold</code></td>
                                    <td><span class="uk-text-bold">Add this class to create bold text.</span></td>
                                </tr>
                                <tr>
                                    <td><code>.uk-text-muted</code></td>
                                    <td><span class="uk-text-muted">Add this class to mute your text.</span></td>
                                </tr>
                                <tr>
                                    <td><code>.uk-text-primary</code></td>
                                    <td><span class="uk-text-primary">Add this class for additional text information.</span></td>
                                </tr>
                                <tr>
                                    <td><code>.uk-text-success</code></td>
                                    <td><span class="uk-text-success">Add this class to indicate success.</span></td>
                                </tr>
                                <tr>
                                    <td><code>.uk-text-warning</code></td>
                                    <td><span class="uk-text-warning">Add this class to indicate a warning.</span></td>
                                </tr>
                                <tr>
                                    <td><code>.uk-text-danger</code></td>
                                    <td><span class="uk-text-danger">Add this class to indicate danger.</span></td>
                                </tr>
                                <tr>
                                    <td><code>.uk-text-contrast</code></td>
                                    <td>Add this class to make the text color readable on flat color areas or pictures. It's often white.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <hr class="uk-article-divider">

                    <h3 id="text-alignment">Text alignment</h3>

                    <p>Add one of these useful classes to align your text.</p>

                    <div class="uk-overflow-container">
                        <table class="uk-table uk-table-condensed uk-text-nowrap">
                            <thead>
                                <tr>
                                    <th class="uk-width-1-4">Class</th>
                                    <th class="uk-width-3-4">Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><code>.uk-text-left</code></td>
                                    <td>Aligns text to the left.</td>
                                </tr>
                                <tr>
                                    <td><code>.uk-text-right</code></td>
                                    <td>Aligns text to the right.</td>
                                </tr>
                                <tr>
                                    <td><code>.uk-text-center</code></td>
                                    <td>Centers text horizontally.</td>
                                </tr>
                                <tr>
                                    <td><code>.uk-text-justify</code></td>
                                    <td>Justifies text.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h4 class="tm-article-subtitle">Example</h4>

                    <div class="uk-grid" data-uk-grid-margin="">
                        <div class="uk-width-medium-1-2">
                            <div class="uk-panel uk-panel-box uk-panel-bordered uk-text-left">Lorem ipsum dolor sit amet, consetetur sadipscing elitr. <code>.uk-text-left</code></div>
                        </div>
                        <div class="uk-width-medium-1-2">
                            <div class="uk-panel uk-panel-box uk-panel-bordered uk-text-right">Lorem ipsum dolor sit amet, consetetur sadipscing elitr. <code>.uk-text-right</code></div>
                        </div>
                        <div class="uk-width-medium-1-2">
                            <div class="uk-panel uk-panel-box uk-panel-bordered uk-text-center">Lorem ipsum dolor sit amet, consetetur sadipscing elitr. <code>.uk-text-center</code></div>
                        </div>
                        <div class="uk-width-medium-1-2 uk-grid-margin">
                            <div class="uk-panel uk-panel-box uk-panel-bordered uk-text-justify">Lorem ipsum dolor sit amet, consetetur sadipscing elitr. <code>.uk-text-justify</code></div>
                        </div>
                    </div>

                    <hr class="uk-article-divider">

                    <h3>Vertical alignment</h3>

                    <p>Add one of these classes to vertically align text to an object.</p>

                    <div class="uk-overflow-container">
                        <table class="uk-table uk-table-condensed uk-text-nowrap">
                            <thead>
                                <tr>
                                    <th class="uk-width-1-4">Class</th>
                                    <th class="uk-width-3-4">Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><code>.uk-text-top</code></td>
                                    <td>Aligns text to the top.</td>
                                </tr>
                                <tr>
                                    <td><code>.uk-text-middle</code></td>
                                    <td>Centers text vertically.</td>
                                </tr>
                                <tr>
                                    <td><code>.uk-text-bottom</code></td>
                                    <td>Aligns text to the bottom.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <h4 class="tm-article-subtitle">Example</h4>

                    <div class="uk-grid" data-uk-grid-margin="">
                        <div class="uk-width-medium-1-2">
                            <img src="http://getuikit.com/docs/images/placeholder_avatar.svg" width="50" height="50">
                            <span class="uk-text-top">Lorem ipsum.</span>
                        </div>
                        <div class="uk-width-medium-1-2">
                            <img src="http://getuikit.com/docs/images/placeholder_avatar.svg" width="50" height="50">
                            <span class="uk-text-middle">Lorem ipsum.</span>
                        </div>
                        <div class="uk-width-medium-1-2">
                            <img src="http://getuikit.com/docs/images/placeholder_avatar.svg" width="50" height="50">
                            <span class="uk-text-bottom">Lorem ipsum.</span>
                        </div>
                    </div>

                    <hr class="uk-article-divider">

                    <h3 id="text-wrapping">Text wrapping</h3>

                    <p>Add one of these useful classes to wrap your text.</p>

                    <div class="uk-overflow-container">
                        <table class="uk-table uk-table-condensed uk-text-nowrap">
                            <thead>
                                <tr>
                                    <th class="uk-width-1-4">Class</th>
                                    <th class="uk-width-3-4">Description</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td><code>.uk-text-truncate</code></td>
                                    <td>Prevents text from wrapping into multiple lines, truncating it instead.</td>
                                </tr>
                                <tr>
                                    <td><code>.uk-text-break</code></td>
                                    <td>Breaks strings if their length exceeds the width of their container.</td>
                                </tr>
                                <tr>
                                    <td><code>.uk-text-nowrap</code></td>
                                    <td>Prevents text from wrapping into multiple lines.</td>
                                </tr>
                            </tbody>
                        </table>
                    </div>

                    <div class="uk-grid uk-margin" data-uk-grid-margin="">
                        <div class="uk-width-medium-1-2">
                            <div class="uk-panel uk-panel-box uk-panel-bordered uk-text-truncate">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt. Lorem ipsum dolor sit amet, consetetur sadipscing elit <code>.uk-text-truncate</code></div>
                        </div>
                        <div class="uk-width-medium-1-2">
                            <div class="uk-panel uk-panel-box uk-panel-bordered uk-text-break">Lorem ipsum dolor sit amet, consetetur sadipscing elitr, sed diam nonumy eirmod tempor invidunt. Lorem ipsum dolor sit amet, consetetur sadipscing elit <code>.uk-text-break</code></div>
                        </div>
                        <div class="uk-width-medium-1-2">
                            <div class="uk-panel uk-panel-box uk-panel-bordered"><p class="uk-margin-remove uk-text-nowrap">Aenean vulputate eleifend tellus. Aenean leo ligula, porttitor eu, consequat vitae, eleifend ac.</p> <code>.uk-text-nowrap</code></div>
                        </div>
                    </div>

                </article>
            </div>
        </div>
    </div>
</div>
<hr />
<div class="padding-verti" id="s-11">
    <div class="uk-container uk-container-center">
        <div class="uk-grid">
            <div class="uk-width-medium-2-3">
                <article class="uk-article">
                    <h2 class="uk-text-center">11. General utilities</h2>

                        <h3 id="clearing-and-floating">Clearing and floating</h3>


                        <div class="uk-overflow-container">
                            <table class="uk-table uk-text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Class</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><code>.uk-float-left</code></td>
                                        <td>Float the element to the left.</td>
                                    </tr>
                                    <tr>
                                        <td><code>.uk-float-right</code></td>
                                        <td>Float the element to the right.</td>
                                    </tr>
                                    <tr>
                                        <td><code>.uk-clearfix</code></td>
                                        <td>Add this class to a parent container to clear floats.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>


                        <hr class="uk-article-divider">

                        <h3>Alignment of images and objects</h3>

                        <p>Align images or other elements with spacing between the text and the element.</p>

                        <div class="uk-overflow-container">
                            <table class="uk-table uk-text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Class</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><code>.uk-align-left</code></td>
                                        <td>Floats the element to the left and creates right and bottom margin.</td>
                                    </tr>
                                    <tr>
                                        <td><code>.uk-align-right</code></td>
                                        <td>Floats the element to the right and creates left and bottom margin.</td>
                                    </tr><tr>
                                        <td><code>.uk-align-medium-left</code></td>
                                        <td>Only affects device widths of <em>768px</em> and higher.</td>
                                    </tr>
                                    
                                    <tr>
                                        <td><code>.uk-align-medium-right</code></td>
                                        <td>Only affects device widths of <em>768px</em> and higher.</td>
                                    </tr>
                                    <tr>
                                        <td><code>.uk-align-center</code></td>
                                        <td>Centers the element and creates bottom margin.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>


                        <h3 id="margin">Margin</h3>

                        <p>Add one of the following classes to add spacing to block elements.</p>

                        <div class="uk-overflow-container">
                            <table class="uk-table uk-table-condensed uk-text-nowrap">
                                <thead>
                                    <tr>
                                        <th class="uk-width-1-4">Class</th>
                                        <th class="uk-width-3-4">Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><code>.uk-margin</code></td>
                                        <td>Adds the same top and bottom margins as a paragraph usually has.</td>
                                    </tr>
                                    <tr>
                                        <td><code>.uk-margin-top</code></td>
                                        <td>Adds top margin.</td>
                                    </tr>
                                    <tr>
                                        <td><code>.uk-margin-bottom</code></td>
                                        <td>Adds bottom margin.</td>
                                    </tr>
                                    <tr>
                                        <td><code>.uk-margin-left</code></td>
                                        <td>Adds left margin.</td>
                                    </tr>
                                    <tr>
                                        <td><code>.uk-margin-right</code></td>
                                        <td>Adds right margin.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <hr class="uk-article-divider">

                        <h3>Larger margin</h3>

                        <p>Add one of the following classes to add larger spacing to block elements.</p>

                        <div class="uk-overflow-container">
                            <table class="uk-table uk-table-condensed uk-text-nowrap">
                                <thead>
                                    <tr>
                                        <th class="uk-width-1-4">Class</th>
                                        <th class="uk-width-3-4">Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><code>.uk-margin-large</code></td>
                                        <td>Adds large top and bottom margin.</td>
                                    </tr>
                                    <tr>
                                        <td><code>.uk-margin-large-top</code></td>
                                        <td>Adds large top margin.</td>
                                    </tr>
                                    <tr>
                                        <td><code>.uk-margin-large-bottom</code></td>
                                        <td>Adds large bottom margin.</td>
                                    </tr>
                                    <tr>
                                        <td><code>.uk-margin-large-left</code></td>
                                        <td>Adds large left margin.</td>
                                    </tr>
                                    <tr>
                                        <td><code>.uk-margin-large-right</code></td>
                                        <td>Adds large right margin.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <hr class="uk-article-divider">

                        <h3>Smaller margin</h3>

                        <p>Add one of the following classes to add smaller spacing to block elements.</p>

                        <div class="uk-overflow-container">
                            <table class="uk-table uk-table-condensed uk-text-nowrap">
                                <thead>
                                    <tr>
                                        <th class="uk-width-1-4">Class</th>
                                        <th class="uk-width-3-4">Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><code>.uk-margin-small</code></td>
                                        <td>Adds small top and bottom margin.</td>
                                    </tr>
                                    <tr>
                                        <td><code>.uk-margin-small-top</code></td>
                                        <td>Adds small top margin.</td>
                                    </tr>
                                    <tr>
                                        <td><code>.uk-margin-small-bottom</code></td>
                                        <td>Adds small bottom margin.</td>
                                    </tr>
                                    <tr>
                                        <td><code>.uk-margin-small-left</code></td>
                                        <td>Adds small left margin.</td>
                                    </tr>
                                    <tr>
                                        <td><code>.uk-margin-small-right</code></td>
                                        <td>Adds small right margin.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <hr class="uk-article-divider">

                        <h3>Remove margin</h3>

                        <p>Add one of the following classes to remove spacing from block elements.</p>

                        <div class="uk-overflow-container">
                            <table class="uk-table uk-table-condensed">
                                <thead>
                                    <tr>
                                        <th class="uk-width-1-4">Class</th>
                                        <th class="uk-width-3-4">Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><code>.uk-margin-remove</code></td>
                                        <td>Removes all margins.</td>
                                    </tr>
                                    <tr>
                                        <td><code>.uk-margin-top-remove</code></td>
                                        <td>Removes top margin.</td>
                                    </tr>
                                    <tr>
                                        <td><code>.uk-margin-bottom-remove</code></td>
                                        <td>Removes bottom margin.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <hr class="uk-article-divider">

                        <h3 id="auto-margin">Auto margin</h3>

                        <p>To add spacing to stacking elements, for example inline elements that wrap on smaller vieports, just add the <code>data-uk-margin</code> attribute to their parent container. It will automatically add the <code>.uk-margin-small-top</code> to the lower element.</p>

                        <h4 class="tm-article-subtitle">Example</h4>

                        <p class="uk-width-1-2" data-uk-margin="">
                            <button class="uk-button">Button</button>
                            <button class="uk-button">Button</button>
                            <button class="uk-button">Button</button>
                            <button class="uk-button">Button</button>
                            <button class="uk-button">Button</button>
                            <button class="uk-button uk-margin-small-top">Button</button>
                            <button class="uk-button uk-margin-small-top">Button</button>
                            <button class="uk-button uk-margin-small-top">Button</button>
                            <button class="uk-button uk-margin-small-top">Button</button>
                            <button class="uk-button uk-margin-small-top">Button</button>
                        </p>

                        <h4 class="tm-article-subtitle">Markup</h4>

                        <pre><code class="xml"><span class="tag">&lt;<span class="title">p</span> <span class="attribute">data-uk-margin</span>&gt;</span>
                        <span class="tag">&lt;<span class="title">button</span> <span class="attribute">class</span>=<span class="value">"uk-button"</span>&gt;</span>...<span class="tag">&lt;/<span class="title">button</span>&gt;</span>
                        <span class="tag">&lt;<span class="title">button</span> <span class="attribute">class</span>=<span class="value">"uk-button"</span>&gt;</span>...<span class="tag">&lt;/<span class="title">button</span>&gt;</span>
                        <span class="tag">&lt;/<span class="title">p</span>&gt;</span></code></pre>

                        <p><span class="uk-badge">NOTE</span> By default, the data attribute adds the <code>.uk-margin-small-top</code> class to stacking elements. To apply a bigger margin, just add the <code>{cls:'.uk-margin-top'}</code> option.</p>

                        <hr class="uk-article-divider">

                        <h3 id="border-radius">Border radius</h3>

                        <p>To add rounded corners to an element, like an image, just add the <code>.uk-border-rounded</code>. To a apply a circled shape, add the <code>.uk-border-circle</code> class.</p>

                        <h4 class="tm-article-subtitle">Example</h4>

                        <p>
                            <img class="uk-border-rounded" src="http://getuikit.com/docs/images/placeholder_200x200.svg" width="200" height="200" alt="Border rounded">
                            <img class="uk-border-circle" src="http://getuikit.com/docs/images/placeholder_200x200.svg" width="200" height="200" alt="Border circle">
                        </p>

                        <pre><code class="xml"><span class="tag">&lt;<span class="title">img</span> <span class="attribute">class</span>=<span class="value">"uk-border-rounded"</span> <span class="attribute">src</span>=<span class="value">""</span> <span class="attribute">alt</span>=<span class="value">""</span>&gt;</span>
                        <span class="tag">&lt;<span class="title">img</span> <span class="attribute">class</span>=<span class="value">"uk-border-circle"</span> <span class="attribute">src</span>=<span class="value">""</span> <span class="attribute">alt</span>=<span class="value">""</span>&gt;</span>
                        </code></pre>

                        <hr class="uk-article-divider">
                           

                        <h3 id="link-muted">Link muted</h3>

                        <p>If a link should not have the default link color, just add the <code>.uk-link-muted</code> class to the anchor element or the parent element.</p>

                        <h4 class="tm-article-subtitle">Example</h4>

                        <h4 class="uk-link-muted"><a href="">Heading</a></h4>

                        <ul class="uk-list uk-width-medium-1-4 uk-link-muted">
                            <li><a href="">Link</a></li>
                            <li><a href="">Link</a></li>
                            <li><a href="">Link</a></li>
                        </ul>

                        <h4 class="tm-article-subtitle">Markup</h4>

                        <pre><code class="xml"><span class="tag">&lt;<span class="title">a</span> <span class="attribute">class</span>=<span class="value">"uk-link-muted"</span>&gt;</span>...<span class="tag">&lt;<span class="title">a</span>&gt;</span>

                        <span class="tag">&lt;<span class="title">h1</span> <span class="attribute">class</span>=<span class="value">"uk-link-muted"</span>&gt;</span><span class="tag">&lt;<span class="title">a</span>&gt;</span>...<span class="tag">&lt;<span class="title">a</span>&gt;</span><span class="tag">&lt;<span class="title">h1</span>&gt;</span>

                        <span class="tag">&lt;<span class="title">ul</span> <span class="attribute">class</span>=<span class="value">"uk-link-muted"</span>&gt;</span>
                            <span class="tag">&lt;<span class="title">li</span>&gt;</span><span class="tag">&lt;<span class="title">a</span>&gt;</span>...<span class="tag">&lt;<span class="title">a</span>&gt;</span><span class="tag">&lt;/<span class="title">li</span>&gt;</span>
                            <span class="tag">&lt;<span class="title">li</span>&gt;</span><span class="tag">&lt;<span class="title">a</span>&gt;</span>...<span class="tag">&lt;<span class="title">a</span>&gt;</span><span class="tag">&lt;/<span class="title">li</span>&gt;</span>
                            <span class="tag">&lt;<span class="title">li</span>&gt;</span><span class="tag">&lt;<span class="title">a</span>&gt;</span>...<span class="tag">&lt;<span class="title">a</span>&gt;</span><span class="tag">&lt;/<span class="title">li</span>&gt;</span>
                        <span class="tag">&lt;/<span class="title">ul</span>&gt;</span></code></pre>

                        <hr class="uk-article-divider">


                        <h3 id="overflow-container">Overflow container</h3>

                        <p>To create a container that provides a horizontal scrollbar whenever the elements inside it are wider than the container itself, just add the <code>.uk-overflow-container</code> class to a <code>&lt;div&gt;</code> element. This comes in useful when having to handle tables on a responsive website, which at some point would just get too big.</p>

                        <h4 class="tm-article-subtitle">Example</h4>

                        <div class="uk-overflow-container">
                            <table class="uk-table uk-table-striped uk-table-condensed uk-text-nowrap">
                                <thead>
                                    <tr>
                                        <th>Table Heading</th>
                                        <th>Table Heading</th>
                                        <th>Table Heading</th>
                                        <th>Table Heading</th>
                                        <th>Table Heading</th>
                                        <th>Table Heading</th>
                                        <th>Table Heading</th>
                                        <th>Table Heading</th>
                                    </tr>
                                </thead>
                                <tfoot>
                                    <tr>
                                        <td>Table Footer</td>
                                        <td>Table Footer</td>
                                        <td>Table Footer</td>
                                        <td>Table Footer</td>
                                        <td>Table Footer</td>
                                        <td>Table Footer</td>
                                        <td>Table Footer</td>
                                        <td>Table Footer</td>
                                    </tr>
                                </tfoot>
                                <tbody>
                                    <tr>
                                        <td>Table Data</td>
                                        <td>Table Data</td>
                                        <td>Table Data</td>
                                        <td>Table Data</td>
                                        <td>Table Data</td>
                                        <td>Table Data</td>
                                        <td>Table Data</td>
                                        <td>Table Data</td>
                                    </tr>
                                    <tr>
                                        <td>Table Data</td>
                                        <td>Table Data</td>
                                        <td>Table Data</td>
                                        <td>Table Data</td>
                                        <td>Table Data</td>
                                        <td>Table Data</td>
                                        <td>Table Data</td>
                                        <td>Table Data</td>
                                    </tr>
                                    <tr>
                                        <td>Table Data</td>
                                        <td>Table Data</td>
                                        <td>Table Data</td>
                                        <td>Table Data</td>
                                        <td>Table Data</td>
                                        <td>Table Data</td>
                                        <td>Table Data</td>
                                        <td>Table Data</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                            
                        <hr />
                        <h3 id="visibility-utilities">Visibility utilities</h3>

                        <div class="uk-overflow-container">
                            <table class="uk-table uk-table-condensed">
                                <thead>
                                    <tr>
                                        <th class="uk-width-1-4">Class</th>
                                        <th class="uk-width-3-4">Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><code>.uk-hidden</code></td>
                                        <td>Hides the element on any device.</td>
                                    </tr>
                                    <tr>
                                        <td><code>.uk-hidden-touch</code></td>
                                        <td>Hides the element on touch devices.</td>
                                    </tr>
                                    <tr>
                                        <td><code>.uk-hidden-notouch</code></td>
                                        <td>Hides the element on non-touch devices.</td>
                                    </tr>
                                    <tr>
                                        <td><code>.uk-invisible</code></td>
                                        <td>Hides the element without removing it from the flow.</td>
                                    </tr>
                                    <tr>
                                        <td><code>.uk-visible-hover</code></td>
                                        <td>Displays hidden content on hover using <code>display: block</code>. Add this class to the parent element.</td>
                                    </tr>
                                    <tr>
                                        <td><code>.uk-visible-hover-inline</code></td>
                                        <td>Displays hidden content on hover using <code>display: inline-block</code>. Add this class to the parent element.</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>

                        <h4 class="tm-article-subtitle">Example</h4>

                        <div class="uk-visible-hover-inline uk-margin">Hover me... <div class="uk-hidden">Bazinga!</div></div>
                           
                        <hr class="uk-article-divider">

                        <h3>Responsive visibility</h3>

                        <p>You can show or hide content on specific viewport widths. Breakpoints are set through variables and can easily be modified. Since the line between different device sizes keeps blurring, class names are kept general and do not refer to particular devices.</p>

                        <div class="uk-overflow-container">
                            <table class="uk-table uk-table-line uk-text-nowrap">
                                <thead>
                                    <tr>
                                        <th class="uk-width-1-4">Class</th>
                                        <th class="uk-width-1-4">Small<br><small>(Phones)</small><br><small style="font-weight: normal;">up to 767</small></th>
                                        <th class="uk-width-1-4">Medium<br><small>(Tablets)</small><br><small style="font-weight: normal;">768 to 959</small></th>
                                        <th class="uk-width-1-4">Large<br><small>(Desktops)</small><br><small style="font-weight: normal;">960 and larger</small></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td><code>.uk-visible-small</code></td>
                                        <td class="uk-text-success">Visible</td>
                                        <td class="uk-text-muted">Hidden</td>
                                        <td class="uk-text-muted">Hidden</td>
                                    </tr>
                                    <tr>
                                        <td><code>.uk-visible-medium</code></td>
                                        <td class="uk-text-muted">Hidden</td>
                                        <td class="uk-text-success">Visible</td>
                                        <td class="uk-text-muted">Hidden</td>
                                    </tr>
                                    <tr>
                                        <td><code>.uk-visible-large</code></td>
                                        <td class="uk-text-muted">Hidden</td>
                                        <td class="uk-text-muted">Hidden</td>
                                        <td class="uk-text-success">Visible</td>
                                    </tr>
                                    <tr>
                                        <td><code>.uk-hidden-small</code></td>
                                        <td class="uk-text-muted">Hidden</td>
                                        <td class="uk-text-success">Visible</td>
                                        <td class="uk-text-success">Visible</td>
                                    </tr>
                                    <tr>
                                        <td><code>.uk-hidden-medium</code></td>
                                        <td class="uk-text-success">Visible</td>
                                        <td class="uk-text-muted">Hidden</td>
                                        <td class="uk-text-success">Visible</td>
                                    </tr>
                                    <tr>
                                        <td><code>.uk-hidden-large</code></td>
                                        <td class="uk-text-success">Visible</td>
                                        <td class="uk-text-success">Visible</td>
                                        <td class="uk-text-muted">Hidden</td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                </article>
            </div>
        </div>
    </div>
</div>

  
<footer class="footer">
  <div class="padding-verti">
    <div class="uk-container uk-container-center">
      <h2 class="uk-text-center">.footer</h2>
      <div class="uk-grid">
        <div class="col-sm-4">
          <h4>h4</h4>
          <ul class="list-unstyled">
            <li>
              <a href="#">ul.list-unstyled > li > a</a>
            </li>
           
          </ul>
          
          <h5 class="h6">h5.h6</h5>
          
        
        </div><!-- /uk-grid -->
      </div><!-- /uk-container uk-container-center -->
    </div><!-- /padding-verti -->
  </div>
  <div class="footer-bottom">
    <div class="uk-container uk-container-center">
    <h3>.footer > .footer-bottom</h3>
      <div class="uk-grid">
        <div class="col-sm-6">
          © <a href="http://www.spade.be" target="_blank">Made by Spade</a>
        </div>
      </div>
    </div>
  </div><!-- /footer-bottom -->
</footer>
<!-- /footer -->
<?php wp_footer();?>
            </body>
</html>