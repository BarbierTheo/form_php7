document.getElementById('test').addEventListener('click', function () {

    fetch('controller-liked.php')
    .then(response => response.json())
    .then(data => {
        
        console.log(data['count(*)'])

    })
})