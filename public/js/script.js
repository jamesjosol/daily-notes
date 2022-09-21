$(document).ready(function(){
    
    $('.form-group input').click(function(e) {
        $(this).parent().removeClass('is-invalid');
        $(this).removeClass('is-invalid');
        $(this).parent().find('span.errspan').remove()
    });

    $('.form-group select').on('change', function(e) {
        $(this).parent().removeClass('is-invalid');
        $(this).removeClass('is-invalid');
        $(this).parent().find('span.errspan').remove()
    });
});

function dismiss() {
        
    document.getElementById('dismiss').parentNode.parentNode.style.display='none';
}

function btnload(msg) {
    btn = document.getElementById('actionBtn');
    btn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> ' + (typeof(msg) !== 'undefined' ? msg : 'Please wait...');
}

var auto_refresh = setInterval(function() { 
    submitform();
}, 60000);

function submitform(){
    document.getElementById("noteForm").submit();
}

let saveFile = () => {
    	
        const content = document.getElementById('content');
        
        let data = content.value;

        const textToBLOB = new Blob([data], { type: 'text/plain' });
        const sFileName = document.getElementById('title_').value;

        let newLink = document.createElement("a");
        console.log(sFileName);
        newLink.download = sFileName;

        if (window.webkitURL != null) {
            newLink.href = window.webkitURL.createObjectURL(textToBLOB);
            toastr.options =
            {
                "closeButton" : true,
                "progressBar" : true,
                "positionClass": "toast-bottom-right",
            }
            toastr.success(sFileName + " successfully downloaded.", "", {"iconClass": 'custom-success'});
        }
        else {
            newLink.href = window.URL.createObjectURL(textToBLOB);
            newLink.style.display = "none";
            document.body.appendChild(newLink);
        }

        newLink.click(); 
    }