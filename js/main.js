// $( document ).ready(function() {
//     console.log( "ready!" );
//
// });

function fb_share(title, url, photo, desc, cap) {
    title = cleanHtmlTags(title);
    desc = cleanHtmlTags(desc);
    //console.log('titulo->'+title+'  foto->'+photo);
    FB.ui( {
        method: 'feed',
        name: title,
        link: url,
        picture: photo,
        description: desc,
        caption: cap
    }, function( response ) {
        console.log( response );
        if ( response !== null && typeof response !== 'undefined' && typeof response.post_id != 'undefined' ) {
            // ajax call to save response
          $.post( 'http://www.webniraj.com/', { 'response': response }, function( result ) {
                console.log( result );
            }, 'json' );
        }
    } );

}


function cleanHtmlTags(txt){
  return txt.replace(/<(?:.|\n)*?>/gm, '');
}
