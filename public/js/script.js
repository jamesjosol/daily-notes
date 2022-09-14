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