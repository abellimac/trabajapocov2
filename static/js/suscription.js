(function ($) {
    $.fn.serializeFormJSON = function () {

        var o = {};
        var a = this.serializeArray();
        $.each(a, function () {
            if (o[this.name]) {
                if (!o[this.name].push) {
                    o[this.name] = [o[this.name]];
                }
                o[this.name].push(this.value || '');
            } else {
                o[this.name] = this.value || '';
            }
        });
        return o;
    };
})(jQuery);

function save_suscription()
{
	var name = $("#name").val();
	var data = $("#form_suscription").serializeFormJSON();
	$.ajax({
		data: data,
		type: "POST",
		dataType: "json",
		url: window.location.href+"suscription/save_suscription",
	})
	.done(function( data, textStatus, jqXHR ) {
		$("#message_suscription").show();
		if (data["success"] == true)
		{
			$("#message_suscription").html(name+", "+data["data"].message);
		}
		else
		{
			$("#message_suscription").html(data["data"].message);
		}
		$("#email").val("");
		$("#name").val("");
	})
	.fail(function( jqXHR, textStatus, errorThrown ) {});
}