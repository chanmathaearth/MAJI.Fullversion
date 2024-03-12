fetch('../topbaremployee.html')
    .then(response => response.text())
    .then(html => {
        document.getElementById('topbar').innerHTML = html;
    });

function loadPage(link) {
    window.location.href = link;
}