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
            <svg class="chicon">
              <use xlink:href="' .get_stylesheet_directory_uri() . '/images/icons.svg#chicon-like" />
            </svg>
            </span>
            <span class="count">'.
            $likeCount.'
            </span>
          </li>
          <li class="comment-count">
            <span class="icon">
            <svg class="chicon">
              <use xlink:href="' .get_stylesheet_directory_uri() . '/images/icons.svg#chicon-comment" />
            </svg>
            </span>
            <span class="count">'.
            $commentCount.'
            </span>
          </li>
          <li class="share-count">
            <span class="icon">
            <svg class="chicon">
              <use xlink:href="' .get_stylesheet_directory_uri() . '/images/icons.svg#chicon-share" />
            </svg>
            </span>
            <span class="count">'.
            $shareCount.'
            </span>
          </li>

        </ul></div>';
  return $html;
}
?>
