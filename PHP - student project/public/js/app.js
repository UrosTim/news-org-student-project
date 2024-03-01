//potvrda prilikom brisanja vesti ili slike
$(document).ready(function(){
        $("a").click(function(){
            if ($(this).attr('href').match(/action=delete/)) {
                if (!confirm('Pres OK to proceed with the removal?'))
                    return false;
            }
        });
});