$(document).ready(function () {
    $(".pay-btn").click(function (e) {
        e.preventDefault();

        var fname = $(".fname").val();
        var lname = $(".lname").val();
        var email = $(".email").val();
        var phone = $(".phone").val();
        var address1 = $(".address1").val();
        var address2 = $(".address2").val();
        var kota = $(".kota").val();
        var provinsi = $(".provinsi").val();
        var kecamatan = $(".kecamatan").val();
        var kelurahan = $(".kelurahan").val();
        var kode_pos = $(".kode_pos").val();
        // var service = $(".layanan").val();
        // var kurir = $(".kurir").val();

        // if (!service) {
        //     fname_error = "Service is Required!";
        //     $("#layanan").html("");
        //     $("#layanan").html(fname_error);
        // } else {
        //     fname_error = "";
        //     $("#layanan").html("");
        // }

        // if (!kurir) {
        //     fname_error = "Courier is Required!";
        //     $("#kurir").html("");
        //     $("#kurir").html(fname_error);
        // } else {
        //     fname_error = "";
        //     $("#kurir").html("");
        // }

        if (!fname) {
            fname_error = "First Name is Required!";
            $("#fname_error").html("");
            $("#fname_error").html(fname_error);
        } else {
            fname_error = "";
            $("#fname_error").html("");
        }

        if (!lname) {
            lname_error = "Last Name is Required!";
            $("#lname_error").html("");
            $("#lname_error").html(lname_error);
        } else {
            lname_error = "";
            $("#lname_error").html("");
        }

        if (!email) {
            email_error = "Email is Required!";
            $("#email_error").html("");
            $("#email_error").html(email_error);
        } else {
            email_error = "";
            $("#email_error").html("");
        }

        if (!phone) {
            phone_error = "Phone is Required!";
            $("#phone_error").html("");
            $("#phone_error").html(phone_error);
        } else {
            phone_error = "";
            $("#phone_error").html("");
        }

        if (!address1) {
            address1_error = "Address 1 is Required!";
            $("#address1_error").html("");
            $("#address1_error").html(address1_error);
        } else {
            address1_error = "";
            $("#address1_error").html("");
        }

        if (!address2) {
            address2_error = "Address 2 is Required!";
            $("#address2_error").html("");
            $("#address2_error").html(address2_error);
        } else {
            address2_error = "";
            $("#address2_error").html("");
        }

        if (!kota) {
            kota_error = "City is Required!";
            $("#kota_error").html("");
            $("#kota_error").html(kota_error);
        } else {
            kota_error = "";
            $("#kota_error").html("");
        }

        if (!provinsi) {
            provinsi_error = "Province is Required!";
            $("#provinsi_error").html("");
            $("#provinsi_error").html(provinsi_error);
        } else {
            provinsi_error = "";
            $("#provinsi_error").html("");
        }

        if (!kecamatan) {
            kecamatan_error = "Subdistrict is Required!";
            $("#kecamatan_error").html("");
            $("#kecamatan_error").html(kecamatan_error);
        } else {
            kecamatan_error = "";
            $("#kecamatan_error").html("");
        }

        if (!kelurahan) {
            kelurahan_error = "Ward/Village is Required!";
            $("#kelurahan_error").html("");
            $("#kelurahan_error").html(kelurahan_error);
        } else {
            kelurahan_error = "";
            $("#kelurahan_error").html("");
        }

        if (!kode_pos) {
            kode_pos_error = "Postal Code is Required!";
            $("#kode_pos_error").html("");
            $("#kode_pos_error").html(kode_pos_error);
        } else {
            kode_pos_error = "";
            $("#kode_pos_error").html("");
        }

        if (
            fname_error != "" ||
            lname_error != "" ||
            email_error != "" ||
            phone_error != "" ||
            address1_error != "" ||
            address2_error != "" ||
            kota_error != "" ||
            provinsi_error != "" ||
            kecamatan_error != "" ||
            kelurahan_error != "" ||
            kode_pos_error != ""
        ) {
            return false;
        } else {
            var data = {
                fname: fname,
                lname: lname,
                email: email,
                phone: phone,
                address1: address1,
                address2: address2,
                kota: kota,
                provinsi: provinsi,
                kecamatan: kecamatan,
                kelurahan: kelurahan,
                kode_pos: kode_pos,
            };

            $.ajax({
                type: "POST",
                url: "/proceed-to-pay",
                data: data,
                success: function (response) {
                    alert(response.total_price);
                },
            });
        }
    });
});
