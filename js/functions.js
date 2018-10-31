
function loadTable() // loads the second combo using the selected item in the first one
{
    $idSector = $("select#primaryCmb").val();
    $.ajax({
        type: 'GET',
        data: 'submit=&idSector=' + $idSector,
        dstaType: 'json',
        url: "../controller/companyBySectorControllerJSON.php",
        success: function (datuak) {
           alert(datuak);

            $("#selectCompany").find("option").remove(); // borratzen du taulan lehendikzegoena

            $myData = JSON.parse(datuak);
            $.each($myData,
                    function (index, info) {
                        var newRow = "<option value=" + info.idCompany + ">" + info.name + "</option>";

                        jQuery(newRow).appendTo("#selectCompany");
                    });

            return false;
        },
        error: function (xhr) {
            alert("An error occured: " + xhr.status + " " + xhr.statusText);
        }
    });
};

