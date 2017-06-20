$(document).ready(function() {

    $("#caradvisor_bundle_review_repair_type_dealerName").keyup(function() {
        var dealerName = $(this).val();
        if (dealerName.length >= 2) {
            $.ajax({
                type: "POST",
                url: "/find-dealername/" + dealerName,
                dataType: 'json',
                timeout: 3000,
                success: function(response) {
                    var dealerNames = JSON.parse(response.data);
                    html = "";
                    for (i = 0; i < dealerNames.length; i++) {
                        html += "<li>" + dealerNames[i].dealerName + " - " + dealerNames[i].city + " - " + dealerNames[i].postalCode + "</li>";
                    }
                    $('#autocomplete').html(html);
                    $('#autocomplete li').on('click', function () {
                        var dealer = $(this).text();
                        var dealerInfo = dealer.split('-');
                        $('#caradvisor_bundle_review_repair_type_dealerName').val(dealerInfo[0]);
                        $('#caradvisor_bundle_review_repair_type_city').val(dealerInfo[1]);
                        $('#caradvisor_bundle_review_repair_type_postalCode').val(dealerInfo[2]);
                        $('#autocomplete').html('');
                    });
                },
                error: function() {
                    $('#autocomplete').text('Ajax call error');
                }
            });
        } else {
            $('#autocomplete').html('');
        }
    });
});
