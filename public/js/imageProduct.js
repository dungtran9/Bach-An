$(document).ready(function () {
    $("#image").change(function () {
        $('#result').html("");
        let image = document.getElementById("image").files;
        console.log(image);
        $('#result').append("<img src='" + URL.createObjectURL(event.target.files[0]) + "' style=\"width: 200px;height: 200px\">");
    });

});
