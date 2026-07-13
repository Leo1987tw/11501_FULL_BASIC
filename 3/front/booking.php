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
    </style>

    <h3 class="ct">線上訂票</h3>

    <table class="booking-form">
        <tr>
            <td style="width: 60px;;">
                電影:
            </td>
            <td>
                <select name="movie" id="movie"></select>
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
        <button class="btn-submit">確定</button>
        <button class="btn-reset">重置</button>
    </div>
</div>

<script>
    getMovies();

    $("#movie").on("change", function(){
        let id = $(this).val();
        getDays(id);
    });

    $("#date").on("change", function(){
        let movie = $("#movie").val();
        let date = $(this).val();
        getSessions(movie, date);
    });

    function getMovies(){
        $.get("./api/api_get_movies.php", (movies) => {
            $("#movie").html(movies);
            let movie = $("#movie").val();
            getDays(movie);
        });
    }

    function getDays(movie){
        $.get("./api/api_get_days.php", {movie}, (days) => {
            $("#date").html(days);
            let date = $("#date").val();
            getSessions(movie, date);
        });
    }

    function getSessions(movie, date){
        $.get("./api/api_get_sessions.php", {movie, date}, (sessions) => {
            $("#session").html(sessions);
        })
    }
</script>