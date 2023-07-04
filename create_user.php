<html>
<head>
    <title>Create User</title>
    <style>

        .popup {
            top:12px;
            right:12px;
            position: fixed;
            background: green;
            padding: 15px 40px;
            font-size: 15px;
            font-family: sans-serif;
            color: #ffffff;
            border-radius: 40px;
            animation: popup 5s ease-in-out;
        }

        @keyframes popup {
        0% {
            right: -250px;
        }
        10%, 90% {
            right: 40px;
        }
        100% {
            right: -250px;
        }
        }
    </style>

    <script>
        function displayPopup(message) {
            let el = document.createElement('DIV');
            el.classList.add('popup');
            el.innerHTML = message;
            document.body.appendChild(el);
            setTimeout(() => {
            el.remove();
            },5000);


        }

        function createUser() {
            var username = document.getElementById("username").value;
            var location = document.getElementById("location").value;
            var password = document.getElementById("password").value;

            var formData = new FormData();
            formData.append("username", username);
            formData.append("location", location);
            formData.append("password", password);

            fetch("usertest.php", {
                method: "POST",
                body: formData
            })
            .then(response => response.json())
            .then(data => displayPopup(data.message))
            .catch(error => console.error(error));
        }
    </script>
</head>
<body>
    <h1>Create User</h1>
    <form>
 
        <input type="text" id="username" placeholder="Enter username" required>
        <input type="text" id="location" placeholder="Enter location" required>
        <input type="text" id="password" placeholder="Enter password" required>

    </form>
    <input type="submit" value="Create" onclick="createUser()">

 


</body>
</html>


