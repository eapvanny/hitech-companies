$('.hover-btn')
    .popup()
;
$('.link')
    .popup()
;
$('.ui.modal')
  .modal('show')
;
$('.user-role')
    .popup()
;

$('.ui.dropdown')
  .dropdown()
;

// $('#master-content')
//     .transition('fade up')
//     .transition('fade up')
// ;

$('#addUserForm')
  .form({
    on: 'blur',
    fields: {
      name: {
        identifier: 'name',
        rules: [
          {
            type   : 'empty',
            prompt : 'Please enter fullname'
          }
        ]
      },
      username: {
        identifier: 'username',
        rules: [
          {
            type   : 'empty',
            prompt : 'Please enter username'
          }
        ]
      },
      password: {
        identifier: 'password',
        rules: [
          {
            type   : 'empty',
            prompt : 'Please enter password'
          }
        ]
      },
      match: {
        identifier: 'c_password',
        rules: [
          {
            type   : 'match[password]',
            prompt : 'Please enter confirm password and match with password'
          }
        ]
      },
      role: {
        identifier  : 'role',
        rules: [
          {
            type   : 'empty',
            prompt : 'Please select a user role'
          }
        ]
      },
    }
  })
;

$('.message .close')
  .on('click', function() {
    $(this)
      .closest('.message')
      .transition('fade')
    ;
  })
;

$('#changPassowrd')
  .form({
    on: 'blur',
    fields: {
      password: {
        identifier: 'password',
        rules: [
          {
            type   : 'empty',
            prompt : 'Please enter password'
          }
        ]
      },
      new_password: {
        identifier: 'new_password',
        rules: [
          {
            type   : 'empty',
            prompt : 'Please enter new password'
          }
        ]
      },

      c_new_password: {
        identifier: 'c_new_password',
        rules: [
          {
            type: 'empty',
            prompt: 'Please enter confirm new password'
          },
          {
            type   : 'match[new_password]',
            prompt : 'Please enter confirm new password and match with new password'
          }

        ]
      },
      
    }
  })
;




