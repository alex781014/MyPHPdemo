<?php require __DIR__ . '/parts/connect_db.php';
$pageName = 'ab-add';
$title = '新增通訊錄資料 - 小鑫的網站';

?>
<?php include __DIR__ . '/parts/html-head.php' ?>
<?php include __DIR__ . '/parts/navbar.php' ?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title">新增資料</h5>
                    <!-- novalidate  不要用html5的檢查方式 -->
                    <form name="form1" onsubmit="sendData();return false;" novalidate>
                        <div class="mb-3">
                            <label for="name" class="form-label">* name</label>
                            <!-- required 必填 -->
                            <input type="text" class="form-control" id="name" name="name" required>
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="email" class="form-label">email</label>
                            <input type="email" class="form-control" id="email" name="email">
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="mobile" class="form-label">mobile</label>
                            <!-- pattern要符合格式 -->
                            <input type="text" class="form-control" id="mobile" name="mobile" pattern="09\d{8}">
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="birthday" class="form-label">birthday</label>
                            <input type="date" class="form-control" id="birthday" name="birthday">
                            <div class="form-text"></div>
                        </div>
                        <div class="mb-3">
                            <label for="address" class="form-label">address</label>
                            <textarea class="form-control" name="address" id="address" cols="30" rows="3"></textarea>
                            <div class="form-text"></div>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include __DIR__ . '/parts/scripts.php' ?>
<script>
    //TODO : 欄位檢查，前端的檢查  0525/11:50
    const email_re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zAZ]{2,}))$/;
    const mobile_re = /^09\d{2}-?\d{3}-?\d{3}$/;
    const name_f = document.form1.name;
    const email_f = document.form1.email;
    const mobile_f = document.form1.mobile;


    async function sendData() {
        //TODO : 欄位檢查，前端的檢查
        let isPass = true; //預設是通過檢查
        if (name_f.value.length < 2) {
            alert("姓名至少兩個字")
            ispass = false;
        }
        // 如果你有填內容 跟 email格式不符合    test是去查詢有沒有符合raq ex 的規則
        if (email_f.value && !email_re.test(email_f.value)) {
            alert("email格式錯誤")
            isPass = false;
        }
        if (mobile_f.value && !mobile_re.test(mobile_f.value)) {
            alert("手機格式錯誤")
            isPass = false;
        }



        // 如果沒有通過就直接結束 
        if (!isPass) {
            return;
        }



        const fd = new FormData(document.form1);
        const r = await fetch('ab-add-api.php', {
            method: 'POST',
            body: fd,
        });
        const result = await r.json()
        console.log(result)
    }
</script>
<?php include __DIR__ . '/parts/html-foot.php' ?>