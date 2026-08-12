<div id="mm">
    <style>
        .booking-form {
            width: 450px;
            margin: 20px auto;
            padding: 20px;
            background-color: gray;
            border: 1px solid white;
        }

        .booking-form td {
            padding: 5px;
            border: 1px solid white;
        }

        .booking-form td select {
            width: 100%;
        }

        .seats {
            box-sizing: border-box;
            display: flex;
            flex-wrap: wrap;
            justify-content: center;
            align-items: center;
            width: 540px;
            height: 370px;
            margin: auto;
            padding: 18px 110px 0px 110px;
            background-image: url("./images/03D04.png");
            background-repeat: no-repeat;
            background-position: center;
        }

        .seat {
            position: relative;
            width: 64px;
            height: 85px;
            text-align: center;
        }

        .seat>input {
            position: absolute;
            width: 15px;
            height: 15px;
            right: 5px;
            bottom: 5px;
        }

        .none {
            background-image: url("./images/03D02.png");
            background-repeat: no-repeat;
            background-position: center;
        }

        .booked {
            background-image: url("./images/03D03.png");
            background-repeat: no-repeat;
            background-position: center;
        }
    </style>

    <h3 class="ct">線上訂票</h3>

    <div id="booking-form">
        <table class="booking-form">
            <tr>
                <td style="width: 60px;;">
                    電影:
                </td>
                <td>
                    <select name="title" id="title"></select>
                </td>
            </tr>
            <tr>
                <td>
                    日期:
                </td>
                <td>
                    <select name="date" id="date"></select>
                </td>
            </tr>
            <tr>
                <td>
                    場次:
                </td>
                <td>
                    <select name="session" id="session"></select>
                </td>
            </tr>
        </table>
        <div class="ct">
            <button class="btn-submit" onclick="booking()">確定</button>
            <button class="btn-reset" onclick="getMovies()">重置</button>
        </div>
    </div>

    <div id="seats" class="ct" style="display: none; width: 540px; margin: auto;"></div>
</div>

<script>
    let movieId = (new URLSearchParams(location.search)).get("id");
    // console.log(movieId);

    getMovies();

    $("#title").on("change", function(){
        let title = $(this).val();
        getDates(title);
    });

    $("#date").on("change", function(){
        let title = $("#title").val();
        let date = $(this).val();
        getSessions(title, date);
    });

    function getMovies(){
        $.get("./api/api_get_movies.php", (titles) => {
            $("#title").html(titles);
            if(movieId != null){
                $(`#title option[value="${movieId}"]`).prop("selected", true);
            }
            let movieID = $("#title").val();
            getDates(movieID);
        });
    }

    function getDates(movieID){
        $.get("./api/api_get_dates.php", {movieID}, (dates) => {
            $("#date").html(dates);
            let date = $("#date").val();
            getSessions(movieID, date);
        });
    }

    function getSessions(movieID, date){
        $.get("./api/api_get_sessions.php", {movieID, date}, (sessions) => {
            $("#session").html(sessions);
        })
    }

    function booking(){
        let data = {
            "movie_id": $("#title option:selected").val(), 
            "on_date": $("#date").val(), 
            "session": $("#session").val()
        }

        $("#booking-form").hide();
        $.get("./api/api_get_seats.php", data , (seats) => {
            $("#seats").html(seats);
            $(".seats-movie").text($("#title option:selected").text());
            $(".seats-date").text($("#date").val());
            $(".seats-session").text($("#session").val());
        })
        $("#seats").show();
    }

    function backForm(){
        $("#booking-form").show();
        $("#seats").hide();
    }
</script>