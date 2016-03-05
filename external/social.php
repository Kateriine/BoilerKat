<?php

//Share with counts
// $desk = true or false so it's sticky or not
function single_share($desk){
  global $post;

  // $data = posts_social_share_count($post->post_id);
  // $fbCount = $data["Facebook"]["share_count"];
  // $tCount = $data['Twitter'];
  // $gCount = $data['GooglePlusOne'];
  // $lCount = $data['LinkedIn'];
  $jsonFb = @file_get_contents('https://api.facebook.com/method/links.getStats?urls='.urlencode(get_permalink()) . '&format=json');

  $counts = json_decode($jsonFb, true);
  $fbCount = $counts[0]["share_count"];

  $jsonTwitter = @file_get_contents('http://cdn.api.twitter.com/1/urls/count.json?url='.urlencode(get_permalink()));
  $counts2 = json_decode($jsonTwitter, true);
  $tCount = $counts2["count"];

    $url = get_permalink();
    if ('/' != substr($url, -1))
      $url = $url . '/';

  $ch = curl_init();
  //WHERE DID I HAVE THAT KEY??
  curl_setopt($ch, CURLOPT_URL, "https://clients6.google.com/rpc?key=AIzaSyCKSbrvQasunBoV16zDH9R33D88CeLr9gQ");
  curl_setopt($ch, CURLOPT_POST, 1);
  curl_setopt($ch, CURLOPT_POSTFIELDS, '[{"method":"pos.plusones.get","id":"p","params":{"nolog":true,"id":"' . $url . '","source":"widget","userId":"@viewer","groupId":"@self"},"jsonrpc":"2.0","key":"p","apiVersion":"v1"}]');
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
  curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-type: application/json'));
  curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);
  $curl_results = curl_exec($ch);
  curl_close($ch);
  $json = json_decode($curl_results, true);
  $count = intval($json[0]['result']['metadata']['globalCounts']['count']);
  $gCount= (string) $count;

  if ($desk==true){
  $html = '<div class="social-share uk-hidden-small" data-uk-sticky>';
  }
  else{
  $html = '<div class="social-share uk-visible-small">';
  }

  $html .= '<ul>
              <li class="twitter">
                <span class="count">'. $tCount.'</span>
                <a href="http://twitter.com/home?status=' . urlencode(get_the_title()) . '%20' . get_permalink() . '" title="'.__('Share on Twitter', 'site').'" class="popup uk-button uk-button-twitter">  
                  <span class="s-icon">                
                    <svg version="1.1" id="twitter" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28px" height="28px" viewBox="0 0 28 28" enable-background="new 0 0 28 28" xml:space="preserve">
                      <path d="M24.253,8.756C24.689,17.08,18.297,24.182,9.97,24.62c-3.122,0.162-6.219-0.646-8.861-2.32
                        c2.703,0.179,5.376-0.648,7.508-2.321c-2.072-0.247-3.818-1.661-4.489-3.638c0.801,0.128,1.62,0.076,2.399-0.155
                        C4.045,15.72,2.215,13.6,2.115,11.077c0.688,0.275,1.426,0.407,2.168,0.386c-2.135-1.65-2.729-4.621-1.394-6.965
                        C5.575,7.816,9.54,9.84,13.803,10.071c-0.842-2.739,0.694-5.64,3.434-6.482c2.018-0.623,4.212,0.044,5.546,1.683
                        c1.186-0.213,2.318-0.662,3.329-1.317c-0.385,1.256-1.247,2.312-2.399,2.942c1.048-0.106,2.069-0.394,3.019-0.851
                        C26.275,7.229,25.39,8.196,24.253,8.756z"></path>
                    </svg>
                  </span>
                </a>
              </li>
              <li class="fb">
                <span class="count">'. $fbCount.'</span>
                <a href="https://www.facebook.com/sharer/sharer.php?u=' . get_permalink() . '" class="popup uk-button uk-button-fb" title="'.__('Share on Google Plus', 'site').'">
                  <span class="s-icon">
                      <svg version="1.1" id="Calque_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="13px" height="28px" viewBox="160.923 50 12.923 28" enable-background="new 160.923 50 12.923 28" xml:space="preserve">
                  <path id="facebook-icon" d="M163.855,59.154h-2.932v4.786h2.932V78h5.638V63.88h3.934l0.418-4.727h-4.353c0,0,0-1.765,0-2.692
                    c0-1.114,0.225-1.556,1.301-1.556c0.868,0,3.051,0,3.051,0V50c0,0-3.216,0-3.904,0c-4.195,0-6.087,1.847-6.087,5.385
                    C163.855,58.466,163.855,59.154,163.855,59.154z"></path>
                  </svg>
                  </span>
                </a>
              </li>
              <li class="gplus">
                <span class="count">'. $gCount.'</span>
                <a href="https://plus.google.com/share?url=' . get_permalink() . '" title="'.__('Share on Google Plus', 'site').'" class="popup uk-button uk-button-gplus">
                  <span class="s-icon">
                    <svg version="1.1" id="gplus" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" x="0px" y="0px" width="28px" height="28px" viewBox="0 0 28 28" enable-background="new 0 0 28 28" xml:space="preserve">
                            <path d="M14.703,15.854l-1.219-0.948c-0.372-0.308-0.88-0.715-0.88-1.459c0-0.748,0.508-1.223,0.95-1.663
                                c1.42-1.119,2.839-2.309,2.839-4.817c0-2.58-1.621-3.937-2.399-4.581h2.097l2.202-1.383h-6.67c-1.83,0-4.467,0.433-6.398,2.027
                                C3.768,4.287,3.059,6.018,3.059,7.576c0,2.634,2.022,5.328,5.604,5.328c0.339,0,0.71-0.033,1.083-0.068
                                c-0.167,0.408-0.336,0.748-0.336,1.324c0,1.04,0.551,1.685,1.011,2.297c-1.524,0.104-4.37,0.273-6.467,1.562
                                c-1.998,1.188-2.605,2.916-2.605,4.137c0,2.512,2.358,4.84,7.289,4.84c5.822,0,8.904-3.223,8.904-6.41
                                c0.008-2.327-1.359-3.489-2.829-4.731H14.703z M10.269,11.951c-2.912,0-4.231-3.765-4.231-6.037c0-0.884,0.168-1.797,0.744-2.511
                                c0.543-0.679,1.489-1.12,2.372-1.12c2.807,0,4.256,3.798,4.256,6.242c0,0.612-0.067,1.694-0.845,2.478
                                c-0.537,0.55-1.438,0.948-2.295,0.951V11.951z M10.302,25.609c-3.621,0-5.957-1.732-5.957-4.142c0-2.408,2.165-3.223,2.911-3.492
                                c1.421-0.479,3.25-0.545,3.555-0.545c0.338,0,0.52,0,0.766,0.034c2.574,1.838,3.706,2.757,3.706,4.479
                                c-0.002,2.073-1.736,3.665-4.982,3.649L10.302,25.609z"></path>
                            <polygon points="23.254,11.89 23.254,8.521 21.569,8.521 21.569,11.89 18.202,11.89 18.202,13.604 21.569,13.604 21.569,17.004
                                23.254,17.004 23.254,13.604 26.653,13.604 26.653,11.89      "></polygon>

                    </svg>
                  </span>
                </a>
              </li>
            </ul>
          </div>';
  return $html;
}

//Social stats

function share(){
  global $post;
  $json = @file_get_contents('https://api.facebook.com/method/links.getStats?urls='.get_permalink() . '&format=json');
  $counts = @json_decode($json, true);
  $shareCount = $counts[0]["share_count"];
  $commentCount = $counts[0]["comment_count"];
  $likeCount = $counts[0]["like_count"];

  $html = '<div class="uk-share"><ul>
          <li class="like-count">
            <span class="icon">            
              <svg xmlns="http://www.w3.org/2000/svg" width="105" height="90" viewBox="0 0 105 90"><path d="M105.255 42.174c0-2.362-.94-4.504-2.628-6.02-1.17-1.032-3.293-2.303-6.74-2.303H70.925c1.02-6 2.1-12.976 2.155-13.39.035-.29.053-.563.027-.854-.507-7.433-5.175-16.28-5.378-16.643-.44-.825-1.14-1.475-2-1.846C63.94.387 62.196 0 60.528 0c-3.508 0-6.094 1.73-7.243 3.2-.57.755-.87 1.657-.855 2.6 0 .098.245 9.568.272 12.528-1.23 3.542-11.338 19.794-13.65 21.873-.8.684-2.052 1.687-3.414 2.588-.694-1.224-1.99-1.937-3.498-1.937H4.035c-1.116 0-2.2.353-2.96 1.195-.778.822-1.152 1.87-1.062 2.99L3.265 86.31c.164 2.09 1.91 3.54 4.03 3.54H32.14c2.236 0 3.95-1.497 3.95-3.735V83.85h2.68c.313 0 .91.407 1.317.67 1.613 1.032 3.82 2.33 6.547 2.33h37.07c7.427 0 12.417-5.58 12.417-10.934 0-1.23-.25-2.3-.724-3.344 2.387-2.14 3.763-5.02 3.763-7.832 0-1.23-.243-2.357-.717-3.402 2.385-2.144 3.76-5.05 3.76-7.88 0-1.21-.245-2.367-.72-3.398 2.386-2.142 3.772-5.055 3.772-7.886zM32.09 44.892v40.96H7.295l-3.26-41h28.053v.04zm33.896-5.467h29.9c1.344 0 2.396.306 3.045.884.515.458.774 1.085.774 1.86 0 2.268-2.443 5.548-6.864 5.548v3c1.345 0 2.398.308 3.046.886.516.46.775 1.09.775 1.867 0 2.272-2.442 5.56-6.86 5.56v3c1.344 0 2.395.306 3.042.884.515.458.773 1.084.773 1.86 0 2.268-2.445 5.55-6.868 5.55v3c1.345 0 2.398.305 3.046.884.515.46.774 1.086.774 1.863 0 2.27-2.445 5.554-6.865 5.554h-37.07c-1.098 0-2.34-.803-3.544-1.577-1.343-.864-2.61-1.683-4.024-1.683h-2.976v-29.39c2.28-1.43 4.994-3.217 6.574-4.562 3.07-2.606 15.595-22.57 15.595-25.682 0-2.11-.197-10.03-.26-12.41.428-.32 1.257-.775 2.538-.775.782 0 1.637.168 2.546.5.914 1.822 4.065 8.444 4.48 13.79-.228 1.552-2.037 13.793-3.028 17.723l-.472 1.867h1.926zm2.643-16.578c-.56 3.726-1.54 10.02-2.292 13.522.752-3.618 1.732-9.848 2.29-13.523zm.438-2.992v.007c-.36-5.157-3.102-11.315-4.322-13.833 1.225 2.515 3.973 8.665 4.322 13.825zM92.062 75.87c-.093-2.2-1.73-4.048-5.313-4.048.39 0 .763-.03 1.13-.07 2.887.36 4.18 2.106 4.182 4.118zm3.05-11.274c-.08-2.21-1.717-4.066-5.31-4.066.082 0 .16-.008.243-.01 3.454.084 5.017 1.915 5.068 4.076zm3.048-11.3c-.082-2.214-1.72-4.078-5.318-4.078.152 0 .3-.012.448-.018 3.298.153 4.805 1.962 4.87 4.097zm3.042-11.304c-.083-2.21-1.72-4.067-5.315-4.067h-29.9l.018-.074h29.883c3.627 0 5.258 1.9 5.314 4.142z"/><path opacity=".5" enable-background="new" d="M7.296 85.852H32.09v-30H4.914z"/><path opacity=".3" enable-background="new" d="M4.035 44.85l.88 11.002H32.09v-11z"/></svg>
            </span>
            <span class="count">'.
            $likeCount.'
            </span>
          </li>
          <li class="comment-count">
            <span class="icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="50" height="47" viewBox="0 1 50 47" enable-background="new 0 1 50 47"><title>Artboard 10</title><g><path fill="currentColor" d="M40.738 47.802L28.563 35.18H0V1h50v34.18h-9.262v12.622zM.98 34.2h28l10.777 11.174V34.2h9.262V1.98H.98V34.2z"/></g></svg>
            </span>
            <span class="count">'.
            $commentCount.'
            </span>
          </li>
          <li class="share-count">
            <span class="icon">
              <svg xmlns="http://www.w3.org/2000/svg" width="50" height="41" viewBox="0 0 50 41"><path d="M30.254 4.04l16.48 12.594-16.525 12.36.01-6.322.005-1.962-1.962-.042c-.188-.004-.403-.007-.643-.007-4.607 0-18.17 1-24.818 12.11 1.58-7.455 5.482-12.972 11.66-16.457C20.86 12.706 27.43 12.6 28.213 12.6h.004l2.022.025.004-2.023.012-6.562M28.262 0l-.02 10.6h-.07C26.558 10.6 0 11.06 0 41l1.784-.14c3.71-16.895 20.692-18.198 25.836-18.198.224 0 .424.002.6.006l-.018 10.324 21.85-16.34L28.26 0z" fill="currentColor"/></svg>
            </span>
            <span class="count">'.
            $shareCount.'
            </span>
          </li>

        </ul></div>';
  return $html;
}
?>
