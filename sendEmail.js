    function sendEmail() {

        var emailReceiver = document.getElementById("email").value;

        Email.send({
                Host: "smtp.gmail.com",
                Username: "cykelweb@gmail.com",
                Password: "cykel123.",

                From: "cykelweb@gmail.com",
                To: emailReceiver,
                Subject: "Thank you - 🚴 - You have subscribed to our newsletter",
                Body: "Welcome into the Cykel's family 🚴 , <br> Many thanks for subscribing to our newsletter 😃. <br> You will receive each month a recap of our best products, special discounts, special events for our members and the latest news about the Cykel's sphere 🗺️. <br> Stay Tuned ! <br> Warmly, <br> The Cykel's team."
            })
            .then(function(message) {
                alert("Thank you ! Welcome into the 🚴Cykel family🚴")
            });
    }