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

// LINE CLAMP FOR IE

const containers = document.querySelectorAll('.textos');
Array.prototype.forEach.call(containers, (container) => {  // Loop through each container
    var p = container.querySelector('p');
    var divh = container.clientHeight;
    while (p.offsetHeight > divh) { // Check if the paragraph's height is taller than the container's height. If it is:
        p.textContent = p.textContent.replace(/\W*\s(\S)*$/, '...'); // add an ellipsis at the last shown space
    }
})
