function copyurltoclipboard() {
    var url = window.location.origin + window.location.pathname + window.location.search;
    console.log("Full URL with filename and query: ", url);
    navigator.clipboard.writeText(url).then(function() {
        alert('Copied URL to clipboard');
    }, function(err) {
        console.error('Could not copy URL: ', err);
    });
}