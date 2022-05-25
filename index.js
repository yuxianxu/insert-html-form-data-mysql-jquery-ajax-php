const form = document.getElementById('myForm');

form.addEventListener('submit', (e) => {
  e.preventDefault();
  console.log(form.email.value);
});

function insert() {
  $(document).ready(function () {
    let languages = [];

    $('input[name=languages]').each(function () {
      if ($(this).is(':checked')) {
        languages.push($(this).val());
      }
    });

    console.log(languages);

    $.ajax({
      url: 'function.php',
      type: 'POST',
      data: {
        name: $('input[name=name]').val(),
        email: $('input[name=email]').val(),
        age: $('input[name=age]').val(),
        country: $('select[name=country').val(),
        gender: $('input[name=gender]:checked').val,
        languages: languages.toString(),
        action: 'insert',
      },
      success: function (response) {
        if (response == 1) {
          alert('Data Added Successfully');
        } else if (response == 2) {
          alert('Email Is Not Available');
        } else if (response == 3) {
          alert('You Must Be Able To Speak More Than 1 Language');
        } else {
        }
      },
    });
  });
}
