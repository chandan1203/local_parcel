function questionToggle(flag) {
    if (flag == 1) {
        document.getElementById("ques1").style.display = "none";
        document.getElementById("ques2").style.display = "inline";
        document.getElementById("ques3").style.display = "inline";

        //document.getElementById("ans1").classList.add('zoomIn');

        document.getElementById("ans1").style.display = "inline";
        document.getElementById("ans2").style.display = "none";
        document.getElementById("ans3").style.display = "none";
    } else if (flag == 2) {
        document.getElementById("ques2").style.display = "none";
        document.getElementById("ques1").style.display = "inline";
        document.getElementById("ques3").style.display = "inline";

        document.getElementById("ans2").style.display = "inline";
        document.getElementById("ans1").style.display = "none";
        document.getElementById("ans3").style.display = "none";
    } else if (flag == 3) {
        document.getElementById("ques3").style.display = "none";
        document.getElementById("ques1").style.display = "inline";
        document.getElementById("ques2").style.display = "inline";

        document.getElementById("ans3").style.display = "inline";
        document.getElementById("ans1").style.display = "none";
        document.getElementById("ans2").style.display = "none";
    }
}

function ansToggle(flag) {
    if (flag == 1) {
        document.getElementById("ques1").style.display = "inline";

        document.getElementById("ans1").style.display = "none";
    } else if (flag == 2) {
        document.getElementById("ques2").style.display = "inline";

        document.getElementById("ans2").style.display = "none";
    } else if (flag == 3) {
        document.getElementById("ques3").style.display = "inline";

        document.getElementById("ans3").style.display = "none";
    }
}

function workToggle(flag) {
    if (flag == 1) {
        document.getElementById("marchant-content").style.display = "flex";
        document.getElementById("order-content").style.display = "none";
        document.getElementById("pickup-content").style.display = "none";
    } else if (flag == 2) {
        document.getElementById("marchant-content").style.display = "none";
        document.getElementById("order-content").style.display = "flex";
        document.getElementById("pickup-content").style.display = "none";
    } else if (flag == 3) {
        document.getElementById("marchant-content").style.display = "none";
        document.getElementById("order-content").style.display = "none";
        document.getElementById("pickup-content").style.display = "flex";
    }
}

function areaToggle(flag) {
    if (flag == 1) {
        document.getElementById("inside-dhaka").style.display = " none";
        document.getElementById("outside-dhaka").style.display = "flex";
    } else {
        document.getElementById("inside-dhaka").style.display = "flex";
        document.getElementById("outside-dhaka").style.display = "none";
    }
}

function signinToggle(flag) {
    var toogleContent1 = document.getElementsByClassName("password-login");
    var toogleContent2 = document.getElementsByClassName("otp-login");
    var i = toogleContent1.length;
    var j = toogleContent2.length;

    if (flag == 1) {
        while (i--) toogleContent1[i].style.display = "block";
        while (j--) toogleContent2[j].style.display = "none";
    } else if (flag == 2) {
        while (i--) toogleContent1[i].style.display = "none";
        while (j--) toogleContent2[j].style.display = "block";

        document.getElementById("phone-code").style.display = "block";
        document.getElementById("withpassword").style.display = "none";
    }
}

function sendSignupOTP() {
    let number = document.getElementById("phone_number").value;

    if (number == "") {
        Swal.fire({
            icon: "error",
            title: "Oops...",
            text: "please enter number "
        });
    } else {
        this.showLoading();
        axios
            .get("/send-sign-in-otp/" + number)
            .then(function(response) {
                console.log("success");
                this.hideLoading();
                Swal.fire({
                    position: "top-end",
                    icon: "success",
                    title: "Your Verfication Code sent ",
                    showConfirmButton: false,
                    timer: 1500
                });

                document.getElementById("phone-password").style.display =
                    "flex";
                document.getElementById("phone-code").style.display = "flex";
                document.getElementById("acknowledged-checkbox").style.display =
                    "block";
                document.getElementById("signin-btn").disabled = false;
                document.getElementById("otp-btn").style.display = "none";
                document.getElementById("resent-otp").style.display = "block";
            })
            .catch(function(error) {
                console.log(error);
            });
    }
}

function showLoading() {
    document.querySelector("#loading").classList.add("loading");
    document.querySelector("#loading-content").classList.add("loading-content");
}

function hideLoading() {
    document.querySelector("#loading").classList.remove("loading");
    document
        .querySelector("#loading-content")
        .classList.remove("loading-content");
}

// function nextElementSibling(el) {
//     do { el = el.nextSibling } while ( el && el.nodeType !== 1 );
//     return el;
//   }

//   function ifocus(el) {
//     nextElementSibling(el).className= 'active';
//   }

//   function iblur(el) {
//     if(!el.value.trim()) {
//       nextElementSibling(el).className= '';
//     }
//   }

//NID Upload JS

function readFrontURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $(".image-upload-wrap1").hide();

            $(".file-upload-image1").attr("src", e.target.result);
            $(".file-upload-content1").show();

            $(".image-title1").html(input.files[0].name);
        };

        reader.readAsDataURL(input.files[0]);
    } else {
        removeUpload();
    }
}

function readBackURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $(".image-upload-wrap2").hide();

            $(".file-upload-image2").attr("src", e.target.result);
            $(".file-upload-content2").show();

            $(".image-title2").html(input.files[0].name);
        };

        reader.readAsDataURL(input.files[0]);
    } else {
        removeUpload();
    }
}

function readLogoURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function(e) {
            $(".image-upload-wrap3").hide();

            $(".file-upload-image3").attr("src", e.target.result);
            $(".file-upload-content3").show();

            $(".image-title3").html(input.files[0].name);
        };

        reader.readAsDataURL(input.files[0]);
    } else {
        removeUpload();
    }
}

function removeUpload($flag) {
    if ($flag == 1) {
        $(".file-upload-input1").replaceWith($(".file-upload-input1").clone());
        $(".file-upload-content1").hide();
        $(".image-upload-wrap1").show();
        $(".image-upload-wrap1").bind("dragover", function() {
            $(".image-upload-wrap1").addClass("image-dropping");
        });
        $(".image-upload-wrap1").bind("dragleave", function() {
            $(".image-upload-wrap1").removeClass("image-dropping");
        });
    }

    if ($flag == 2) {
        $(".file-upload-input2").replaceWith($(".file-upload-input2").clone());
        $(".file-upload-content2").hide();
        $(".image-upload-wrap2").show();
        $(".image-upload-wrap2").bind("dragover", function() {
            $(".image-upload-wrap2").addClass("image-dropping");
        });
        $(".image-upload-wrap2").bind("dragleave", function() {
            $(".image-upload-wrap2").removeClass("image-dropping");
        });
    }

    if ($flag == 3) {
        $(".file-upload-input3").replaceWith($(".file-upload-input3").clone());
        $(".file-upload-content3").hide();
        $(".image-upload-wrap3").show();
        $(".image-upload-wrap3").bind("dragover", function() {
            $(".image-upload-wrap3").addClass("image-dropping");
        });
        $(".image-upload-wrap3").bind("dragleave", function() {
            $(".image-upload-wrap3").removeClass("image-dropping");
        });
    }
}

function addShop() {
    console.log("hello ");
    let name = document.getElementById("shop-name").value;
    let shopType = document.getElementById("shop-type").value;
    let shopAddress = document.getElementById("shop-address").value;
    let shopNumber = document.getElementById("shop-number").value;
    let shopStatus = document.getElementById("shop-status").value;
    let shopLogo = document.getElementById("shop-logo").value;

    let data = {
        name: name,
        shopType: shopType,
        shopAddress: shopAddress,
        shopNumber: shopNumber,
        shopStatus: shopStatus,
        shopLogo: shopLogo
    };

    console.log(data);

    axios
        .post("/my-shop", { data })
        .then(response => {
            Swal.fire({
                position: "top-end",
                icon: "success",
                title: "Your Verfication Code sent ",
                showConfirmButton: false,
                timer: 1500
            });
        })
        .catch(err => {});
}

$("input").on("focusin", function() {
    $(this)
        .parent()
        .find("label")
        .addClass("active");
});

$("input").on("focusout", function() {
    if (!this.value) {
        $(this)
            .parent()
            .find("label")
            .removeClass("active");
    }
});
