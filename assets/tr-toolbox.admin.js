/**
* @package TR_Toolbox
*/

/* HTTP Headers Disable */
const button = document.getElementById( 'js-tr-toolbox-http-headers-edit-button' );
// check if were on the right page
if (button != null) {
  button.addEventListener( 'click', function() {
    if ( confirm( 'Editing these options can have serious side effects on your website. Do you unserstand the risks and wish to continue?'  ) ) {
      // hide edit button
      button.classList.add('tr-invisible');
      // remove 'disabled' attribute from fields
      let fields = document.querySelectorAll('.tr-http-header-field');
      fields.forEach( (field) => {
        field.removeAttribute('disabled');
      });
    }
  });
}
