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
                            Tweet
                        </a>
                    </li>
                    <li class="fb">
                      <span class="count">'. $fbCount.'</span>
                        <a href="https://www.facebook.com/sharer/sharer.php?u=' . get_permalink() . '" class="popup uk-button uk-button-fb" title="'.__('Share on Google Plus', 'site').'">
                            Share
                        </a>
                    </li>
                    <li class="gplus">
                      <span class="count">'. $gCount.'</span>
                        <a href="https://plus.google.com/share?url=' . get_permalink() . '" title="'.__('Share on Google Plus', 'site').'" class="popup uk-button uk-button-gplus">
                            +1
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
    $counts = json_decode($json, true);
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