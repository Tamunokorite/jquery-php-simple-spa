function getPage(pagename) {
    $.ajax({
        type: 'GET',
        url: pagename,
        success: function(data) {
            // console.log(data);
            $('#main').html(data);
        },
        error: function(xhr, status, error) {
            $('#main').html('<section><h1>Page Not Found.</h1></section>');
        }
    });
}

function sendMessage() {
    // event.preventDefault();

    let values = {};
    $.each($('#contact-form').serializeArray(), function(i, field) {
        values[field.name] = field.value;
        if (field.value === '') {
            $('#server-message').html(`${field.name} is empty`);
            displayContact();
            return
        }
    });
    // console.log(values);

    $.ajax({
        type: "POST",
        url: "sendmessage.php",
        data: values,
        dataType: "json",
        encode: true,
        success: function (data) {
            document.getElementById('server-message').innerHTML = data['success'];
            // console.log(data);
        },
        error: function(xhr, status, error) {
            document.getElementById('server-message').innerHTML = error;
            // console.log(error);
        }
    })
}

function editMessage(id) {
    let values = {};
    $.each($('#contact-form').serializeArray(), function(i, field) {
        values[field.name] = field.value;
        if (field.value === '') {
            $('#server-message').html(`${field.name} is empty`);
            displayContact();
            return
        }
    });
    values['id'] = id;
    $.ajax({
        type: "POST",
        url: "editmessage.php",
        data: values,
        dataType: "json",
        encode: true,
        success: function (data) {
            // document.getElementById('server-message').innerHTML = data['success'];
            getPage('messages.php');
            alert(data['success']);
            // console.log(data);
        },
        error: function(xhr, status, error) {
            getPage(`editmessage.php?id=${id}`);
            alert(error);
            // console.log(error);
        }
    })
}

function deleteMessage(id) {
    let value = {id: id}
    $.ajax({
        type: "POST",
        url: "deletemessage.php",
        data: value,
        dataType: "json",
        encode: true,
        success: function (data) {
            // console.log(data);
            getPage('messages.php');
            alert(data['success']);
        },
        error: function(xhr, status, error) {
            // console.log(error);
            alert(error);
            // displayContact();
        }
    })
}