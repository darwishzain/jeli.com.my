function copyurltoclipboard() {
    var url = window.location.origin + window.location.pathname + window.location.search;
    console.log("Full URL with filename and query: ", url);
    navigator.clipboard.writeText(url).then(function() {
        alert('Copied URL to clipboard');
    }, function(err) {
        console.error('Could not copy URL: ', err);
    });
}
var advertisment = document.getElementsByClassName('ads');

function toast()
{
    alert('Toast');
    const toastContainer = document.getElementById('toast-container');

    // Create the toast element
    let toast = document.createElement("div");
    toast.classList.add("toast");
    toast.setAttribute("id", "customtoast");
    toast.setAttribute("data-delay", "5000");
    
    // Create the toast header
    let toastHeader = document.createElement("div");
    toastHeader.classList.add("toast-header");

    let toastTitle = document.createElement("strong");
    toastTitle.classList.add("mr-auto");
    toastTitle.textContent = "Bootstrap Toast";

    let closeButton = document.createElement("button");
    closeButton.classList.add("ml-2", "mb-1", "close");
    closeButton.setAttribute("data-dismiss", "toast");
    closeButton.textContent = "×";
    
    toastHeader.appendChild(toastTitle);
    toastHeader.appendChild(closeButton);
    
    // Create the toast body
    let toastBody = document.createElement("div");
    toastBody.classList.add("toast-body");
    toastBody.textContent = "Hello, this is a Bootstrap toast message!";
    
    // Append the header and body to the toast element
    toast.appendChild(toastHeader);
    toast.appendChild(toastBody);
    
    // Append the toast to the container
    toastContainer.appendChild(toast);
    
    // Initialize and show the toast
    $(toast).toast('show');
}
