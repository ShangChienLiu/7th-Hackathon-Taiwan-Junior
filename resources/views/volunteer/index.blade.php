@extends('layouts.master')
@extends('layouts.navbar')
@include('layouts.header')
@section('title')
    志工服務
@endsection
@section('intro')
    <h2>志工服務</h2>
    <p>提供公平受教的及終身學習的機會</p>
@endsection
@section('background') https://url.chyanweb.com/a12 @endsection
@section('style')
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css">
    <link rel="stylesheet" href="{{ asset('assets/css/faq.css') }}">
    {{-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous"> --}}
@endsection

@section('content')
    <section class="wrapper style2 fade">
        <div class="container">
            <h2>現今狀況 & 執行計畫</h2>
            <ul>
                <li>農產業雇用童工的比例相當的高，約占總童工的60%。</li>
                <li>約有1億為5~17歲的孩童被定義為農業中的童工。</li>
                <li>撒哈拉以南隻非洲地區為入學孩童佔全球為入學孩童的一半以上。</li>
                <li>農村地區的平均失學率為城市地區的2倍。</li>
                <li>衝突影響地區的失學兒童約佔全球失學兒童的一半。</li>
                <li>學校糧食計畫不僅提高入學率，尚能改善兒童的營養與健康，同時能夠提升社區農民的收入。</li>
            </ul>
            <p>
                因此我們提供志工服務的計畫，人人都可以幫助失學孩童，只要依照規則填寫，就會安排服務前培訓，完成後即可依照要求分配。
同時也提供學童尋找志工計畫，學童可以填寫需求志工，則會幫助媒合最適志工。
            </p>
        </div>
    </section>
    <script>
        window.onload = function() {
            document.getElementById('one').click();
        }

        function open_box(target) {
            if (target == "question-rent") {
                document.getElementById("question-rent").style.display = '';
                document.getElementById("question-rent").style = 'animation-duration: 1s;display: block;margin: auto;';
                document.getElementById("question-volunteer").style.display = 'none';
                $("#FindVolunteerForm :input").prop("disabled", false);
                $("#BeVolunteerForm :input").prop("disabled", true);
            } else {
                document.getElementById("question-rent").style.display = 'none';
                document.getElementById("question-volunteer").style = 'animation-duration: 1s;display: block;margin: auto;';
                document.getElementById("question-volunteer").style.display = '';
                $("#FindVolunteerForm :input").prop("disabled", true);
                $("#BeVolunteerForm :input").prop("disabled", false);
            }
        }
    </script>
    <div class="container">
        <section class="wrapper style1 special fade-up">
            <header class="major">
                <h2>志工服務</h2>
            </header>
            <div class="row">
                <div class="col-6 btn-div">
                    <a class="animate__animated animate__rotateInDownLeft animate__faster button" type="button"
                        onclick="open_box('question-rent')">尋找志工</a>
                </div>
                <div class="col-6">
                    <a class="animate__animated animate__rotateInDownRight animate__faster button" type="button"
                        onclick="open_box('question-volunteer')">成為志工</a>
                </div>
            </div>
            <div class="box alt animate__animated animate__lightSpeedInLeft" id="question-rent" style="display: none">
                <div class="container px-5 my-5">
                    <div class="row">
                        <div class="align-img">
                            <header class="major">
                                <h2>溫馨提醒</h2>
                            </header>
                            <p>
                                我們平台的中旨，是讓所有人獲得平等的教育機會。
                            </p>
                            <p>
                                持有中低收入證明、身心障礙證明、清寒、急難證明、原住民籍學生證明等，將會優先安排輔導。
                                無以上證明者，也可以申請。
                            </p>
                        </div>
                        @if (session('find_message') == 'error')
                            <script>
                                alert("資料有誤，請重新輸入！")
                            </script>
                        @elseif(session('find_message') == 'success')
                            <script>
                                alert("申請成功！")
                            </script>
                        @endif
                        <div class="align">
                            <form id="FindVolunteerForm" action="/volunteer/find" enctype="multipart/form-data"
                                method="POST">
                                @csrf
                                <div class="mb-3">
                                    <input class="form-control" id="name" name="name" type="text" placeholder="姓名 / Name"
                                        value="{{ old('name') }}" />
                                </div>
                                <div class="mb-3" style="margin-top: 2rem">
                                    <input class="form-control" id="born" name="born" type="text"
                                        onfocus="(this.type='date')" onblur="(this.type='text')"
                                        placeholder="出生日期 / Date of Birth" style="display:inline-block" />
                                </div>
                                <div class="mb-3" style="margin-top: 2rem">
                                    <input class="form-control" id="email" name="email" type="email"
                                        placeholder="電子郵件 / Email Address" value="{{ old('email') }}"
                                        value="{{ old('email') }}" />
                                </div>
                                <div class="mb-3" style="margin-top: 2rem">
                                    <input class="form-control" id="phone" name="phone" type="text"
                                        placeholder="聯絡電話 / Phone" value="{{ old('phone') }}" />
                                </div>
                                <div class="mb-3" style="margin-top: 2rem">
                                    <input class="form-control" id="born" name="start_date" type="text"
                                        onfocus="(this.type='date')" onblur="(this.type='text')"
                                        placeholder="開始日期 / Start of Date" style="display:inline-block" />
                                </div>
                                <div class="mb-3" style="margin-top: 2rem">
                                    <input class="form-control" id="born" name="end_date" type="text"
                                        onfocus="(this.type='date')" onblur="(this.type='text')"
                                        placeholder="結束日期 / End of Date" style="display:inline-block" />
                                </div>
                                <div class="mb-3" style="margin-top: 2rem">
                                    <h3>方便的時間</h3>
                                    <input class="form-control" type="checkbox" id="morning" name="period[]" value="0">
                                    <label for="morning">上午(9:00~12:00)</label>
                                    <input class="form-control" type="checkbox" id="afternoon" name="period[]" value="1">
                                    <label for="afternoon">下午(14:00~17:00)</label>
                                    <input class="form-control" type="checkbox" id="night" name="period[]" value="2">
                                    <label for="night">晚上(19:00~21:00)</label>
                                </div>
                                <div class="mb-3" style="margin-top: 2rem">
                                    <select class="form-control" id="city" name="city" value="{{ old('city') }}" />
                                    <option value="城市" disabled selected>選擇可到府輔導的城市 City</option>
                                    <option value="臺北市">臺北市</option>
                                    <option value="新北市">新北市</option>
                                    <option value="桃園市">桃園市</option>
                                    <option value="臺中市">臺中市</option>
                                    <option value="臺南市">臺南市</option>
                                    <option value="高雄市">高雄市</option>
                                    <option value="新竹縣">新竹縣</option>
                                    <option value="苗栗縣">苗栗縣</option>
                                    <option value="彰化縣">彰化縣</option>
                                    <option value="南投縣">南投縣</option>
                                    <option value="雲林縣">雲林縣</option>
                                    <option value="嘉義縣">嘉義縣</option>
                                    <option value="屏東縣">屏東縣</option>
                                    <option value="宜蘭縣">宜蘭縣</option>
                                    <option value="花蓮縣">花蓮縣</option>
                                    <option value="臺東縣">臺東縣</option>
                                    <option value="澎湖縣">澎湖縣</option>
                                    <option value="金門縣">金門縣</option>
                                    <option value="連江縣">連江縣</option>
                                    <option value="基隆市">基隆市</option>
                                    <option value="新竹市">新竹市</option>
                                    <option value="嘉義市">嘉義市</option>
                                    </select>
                                </div>
                                <div class="mb-3" style="margin-top: 2rem">
                                    <select class="form-control" id="field" name="field" value="{{ old('field') }}" />
                                    <option value="" disabled selected>需求領域</option>
                                    <option value="國文">國文</option>
                                    <option value="英文">英文</option>
                                    <option value="數學">數學</option>
                                    <option value="歷史">歷史</option>
                                    <option value="地理">地理</option>
                                    <option value="公民教育">公民教育</option>
                                    <option value="物理">物理</option>
                                    <option value="化學">化學</option>
                                    <option value="生物">生物</option>
                                    <option value="地球科學">地球科學</option>
                                    <option value="資訊教育">資訊教育</option>
                                    </select>
                                </div>
                                <div class="mb-3" style="margin-top: 2rem">
                                    <input class="form-control" id="proof" name="proof" type="text" title="上傳弱勢證明 (格式限：pdf)"
                                        placeholder="上傳弱勢證明 (格式限：pdf)" onfocus="(this.type='file')" />
                                </div>
                                <div style="margin-top: 2rem">
                                    <input class="button" onclick="document.getElementById('FindVolunteerForm').submit()" id="submitButton" type="submit"></>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <div class="box alt animate__animated animate__lightSpeedInRight" id="question-volunteer" style="display: none">
                <div class="container px-5 my-5">
                    <div class="row">
                        <div class="align-img">
                            <header class="major">
                                <h2>志工招募條件</h2>
                            </header>
                            <p>
                                1. 國內各大專院校在學學生或畢業生，身心健康、具有服務熱忱、有責任感、基本電腦應用能力。
                            </p>
                            <p>
                                2. 需全程參與各階段專業培訓課程(填寫個人資料完成將收到電子郵件)，服務地點（學校或學生家或線上）。
                            </p>
                            <p>
                                3. 本屆志工招募培訓人數為50名，培訓後統一以書面審查及面試甄選錄取。
                            </p>
                            <p>
                                4. 本培訓課程以訓練同理心及培訓教育方式為主，結合各大專院校時數要求。可向本單位申請核發志願服務證與相關服務時數證明。
                            </p>
                        </div>
                        @if (session('be_message') == 'error')
                            <script>
                                alert("資料有誤，請重新輸入！")
                            </script>
                        @elseif(session('be_message') == 'success')
                            <script>
                                alert("申請成功！")
                            </script>
                        @endif
                        <div class="align">
                            <form id="BeVolunteerForm" action="/volunteer/be" enctype="multipart/form-data" method="POST">
                                @csrf
                                <div class="mb-3">
                                    <input class="form-control" id="name" name="name" type="text" placeholder="姓名 / Name"
                                        value="{{ old('name') }}" />
                                </div>
                                <div class="mb-3" style="margin-top: 2rem">
                                    <input class="form-control" id="born" name="born" type="text"
                                        onfocus="(this.type='date')" onblur="(this.type='text')"
                                        placeholder="出生日期 / Date of Birth" style="display:inline-block" />
                                </div>
                                <div class="mb-3" style="margin-top: 2rem">
                                    <input class="form-control" id="email" name="email" type="email"
                                        placeholder="電子郵件 / Email Address" value="{{ old('email') }}"
                                        value="{{ old('email') }}" />
                                </div>
                                <div class="mb-3" style="margin-top: 2rem">
                                    <input class="form-control" id="phone" name="phone" type="text"
                                        placeholder="聯絡電話 / Phone" value="{{ old('phone') }}" />
                                </div>
                                <div class="mb-3" style="margin-top: 2rem">
                                    <input class="form-control" id="born" name="start_date" type="text"
                                        onfocus="(this.type='date')" onblur="(this.type='text')"
                                        placeholder="開始日期 / Start of Date" style="display:inline-block" />
                                </div>
                                <div class="mb-3" style="margin-top: 2rem">
                                    <input class="form-control" id="born" name="end_date" type="text"
                                        onfocus="(this.type='date')" onblur="(this.type='text')"
                                        placeholder="結束日期 / End of Date" style="display:inline-block" />
                                </div>
                                <div class="mb-3" style="margin-top: 2rem">
                                    <h3>方便的時間</h3>
                                    <input class="form-control" id="morning_" type="checkbox" name="period[]" value="0">
                                    <label for="morning_">上午(9:00~12:00)</label>
                                    <input class="form-control" id="afternoon_" type="checkbox" name="period[]" value="1">
                                    <label for="afternoon_">下午(14:00~17:00)</label>
                                    <input class="form-control" id="night_" type="checkbox" name="period[]" value="2">
                                    <label for="night_">晚上(19:00~21:00)</label>
                                </div>
                                <div class="mb-3" style="margin-top: 2rem">
                                    <select class="form-control" id="city" name="city" value="{{ old('city') }}" />
                                    <option value="城市" disabled selected>選擇輔導的城市 City</option>
                                    <option value="臺北市">臺北市</option>
                                    <option value="新北市">新北市</option>
                                    <option value="桃園市">桃園市</option>
                                    <option value="臺中市">臺中市</option>
                                    <option value="臺南市">臺南市</option>
                                    <option value="高雄市">高雄市</option>
                                    <option value="新竹縣">新竹縣</option>
                                    <option value="苗栗縣">苗栗縣</option>
                                    <option value="彰化縣">彰化縣</option>
                                    <option value="南投縣">南投縣</option>
                                    <option value="雲林縣">雲林縣</option>
                                    <option value="嘉義縣">嘉義縣</option>
                                    <option value="屏東縣">屏東縣</option>
                                    <option value="宜蘭縣">宜蘭縣</option>
                                    <option value="花蓮縣">花蓮縣</option>
                                    <option value="臺東縣">臺東縣</option>
                                    <option value="澎湖縣">澎湖縣</option>
                                    <option value="金門縣">金門縣</option>
                                    <option value="連江縣">連江縣</option>
                                    <option value="基隆市">基隆市</option>
                                    <option value="新竹市">新竹市</option>
                                    <option value="嘉義市">嘉義市</option>
                                    </select>
                                </div>
                                <div class="mb-3" style="margin-top: 2rem">
                                    <select class="form-control" id="field" name="field" value="{{ old('field') }}" />
                                    <option value="" disabled selected>專長領域</option>
                                    <option value="國文">國文</option>
                                    <option value="英文">英文</option>
                                    <option value="數學">數學</option>
                                    <option value="歷史">歷史</option>
                                    <option value="地理">地理</option>
                                    <option value="公民教育">公民教育</option>
                                    <option value="物理">物理</option>
                                    <option value="化學">化學</option>
                                    <option value="生物">生物</option>
                                    <option value="地球科學">地球科學</option>
                                    <option value="資訊教育">資訊教育</option>
                                    </select>
                                </div>
                                <div class="mb-3" style="margin-top: 2rem">
                                    <input class="form-control" id="intro" name="intro" type="text"
                                        title="上傳自介資料 (格式限：pdf) / Upload self introduction (Format restrictions: pdf)"
                                        placeholder="上傳自介資料 (格式限：pdf) / Upload self introduction (Format restrictions: pdf)"
                                        onfocus="(this.type='file')" />
                                </div>
                                <div style="margin-top: 2rem">
                                    <input class="button" onclick="document.getElementById('BeVolunteerForm').submit()"
                                        id="submitButton" type="submit">
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </div>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>



@endsection

@include('layouts.footer')
