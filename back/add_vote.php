<style>
    h2 {
        text-align: center;
    }

    .container {
        width: 500px;
    }

    p {
        text-align: left;
        margin: 10px;
        font-size: 20px;
    }
    #subject,
    #open_time,
    #close_time,
    #img,
    #description-input {
        font-size: 20px;
        background-color: transparent;
        border: 2px solid #CCC;
        border-radius: 12px;
        appearance: none;
        margin-bottom: 20px;
    }

    #subject,
    #open_time,
    #close_time,
    #img,
    #description-input {
        background-color: white;
    }

    #radio {
        font-size: 20px;
    }

    #submit-btn {
        font-size: 20px;
        background-color: transparent;
        color: blue;
        border: 2px solid #7B85D4;
        border-radius: 12px;
        appearance: none;
        margin-bottom: 20px;
        text-align: center;

    }
</style>
<main>
    <div>
        <h1>新增主題</h1>
        <form action="./api/add_vote.php" method="post" enctype="multipart/form-data">
            <div class="container">
                <div class="row">


                    <p>
                        <label for="subject">主題說明</label>
                        <input type="text" name="subject" id="subject" class="subject-input" width="400px">
                    </p>

                    <p class="time-item">
                        <label for="open_time">開放時間</label>
                        <input type="datetime-local" name="open_time" id="open_time" >
                    </p>
                    <p class="time-item">
                        <label for="close_time">關閉時間</label>
                        <input type="datetime-local" name="close_time" id="close_time" >
                    </p>
                    </p>

                    <p>
                        <label for="type">單複選</label>
                        <input type="radio" name="type" value="1">單選&nbsp;&nbsp;
                        <input type="radio" name="type" value="2">複選
                    </p>

                    <p>
                        <label for="  login-type">限定資格</label>

                        <input  type="radio" value="0" name="login" id="radio">是

                        <input  type="radio" value="1" name="login" id="radio">否

                    </p>


                    <p>
                        <label for="img">上傳圖檔：</label>
                        <input type="file" name="img" id="img">
                    </p>

                    <div class="options">
                        <p>
                            <label for="description">選項</label>
                            <input type="text" name="description[]" id="description-input">
                            <span onclick="addOption()"><img src="./image/add.png" width="30px" height="30px"></span>
                            <span onclick="removeOption(this)"><img src="./image/minus.png" width="30px" height="30px"></span>
                        </p>
                    </div>
                    <div class="mb-3 row">
                        <div class="col-sm-4">
                            <input type="submit" id="submit-btn" class="btn btn-outline-primary" value="新增">
                        </div>
                    </div>
                </div>
        </form>
    </div>
    <script>
        function addOption() {
            let opt = `<div class="options">
            <p>
                            <label for="description">選項</label>
                            <input type="text" name="description[]" class="description-input" id="description-input" >
                            <span onclick="addoption()">
                                <img src="./image/add.png" width="30px" height="30px">
                            </span>
                            <span onclick="removeoption(this)">
                                <img src="./image/minus.png" width="30px" height="30px">
                            </span>
                           
                        </p>
                        </div>`
            $(".options").append(opt);
        }

        function removeOption(el) {
            let dom = $(el).parent()
            $(dom).remove();
        }
    </script>