@extends('layouts.master')
@extends('layouts.navbar')
@include('layouts.header')
@section('title')
    設備租借 IT eqpt. Rent
@endsection
@section('intro')
    <h2>設備租借</h2>
    <p>提供公平受教的及終身學習的機會</p>
@endsection
@section('background')https://url.chyanweb.com/ac9 @endsection
@section('content')
    <script>
        window.onload = function() {
            document.getElementById('one').click();
        }
    </script>
    <!-- style -->
    <section class="style1 special fade-up">
        <div class="container">
            <header class="major">
                <h2>執行計畫</h2>
            </header>
            <p>目前台灣弱勢學生所面臨的遠端教學困境，主要原因是數位設備和網路連線的基礎建設不足與不穩，以及資訊融入教學的師資發展、學生能力培養乃至家長理解與配合程度均尚未健全。
                根據PISA國際評比11，OECD(經濟合作暨發展組織)國家15歲青年學子中，平均只有一半擁有足夠的線上學習支持資源，約2/3的校長均回報學校教師尚未具備科技融入教學的相關知能與教學能力。
            </p>
            <p>
                放眼世界其他國家，受到新冠疫情影響，各國為了停課不停學，紛紛開始探索不同的替代方案。UNESCO(聯合國教科文組織)統計全球超過90%國家均採取不同程度與形式的遠距學習政策。
                然而，通過及執行遠距發展政策並不代表所有學童就能順利恢復學習，事實上，有至少<b>4千630萬</b>的學童無法參與遠距學習，陷入失學窘境。而在<b>臺灣</b>，硬體設備的普及率雖已較以往提升，但並非百分之百普及。截至2020年3月10日為止，各縣市教育局處調查發現，仍有12%的國中小學生家裡沒有行動載具，10%的學生無網路可用。
            </p>
            <p>
                因此這個網站提供設備的租借，任何有需求的人，只要提出相關證明，即可租借電腦，讓孩童不但可以獲得公平受教的機會，年長者也可以終身學習。
            </p>
        </div>
    </section>
    <section class="wrapper style2 fade">
        <div class="container">
            <header>
                <h2>執行辦法</h2>
            </header>
            <ul>
                <li>對象：針對弱勢群體提供的，只要持有中低收入戶、身心障礙證明的學生或年長者，就能免費租借。</li>
                <li>地點：我們接受申請後，會審查用戶的內容，並且按照編號順序分發電腦資源到申請人指定地點。</li>
                <li>時間：每天24小時都能夠預約，如果有可使用電腦，就會電話連絡，並且告知抵達時間。</li>
                <li>租借方式：至此網站填寫相關資料即可。</li>
                <li>服務：鼓勵家裡有閒置電腦的個人或公司，捐出他們多餘或淘汰的電腦來讓弱勢的學生使用，我們平台會公開電腦出借後的使用紀錄，讓捐助者獲得捐助後的反饋，也讓租借的學生發揮數位學習最大的功效。同時也會跟申請人簽訂損壞賠償條款，旨在讓大家珍惜電腦資源。
                </li>
            </ul>
        </div>
    </section>
    <div class="container px-5 my-5">
        <div align="center">
            <h2>租借資料</h2>
        </div>
        <div class="row">
            <div class="align-img">
                <img id="img_rent" src="https://url.chyanweb.com/19d">
            </div>
            @if (session('message') == 'error')
                <script>
                    alert("資料有誤，請重新輸入！")
                </script>
            @elseif(session('message') == 'success')
                <script>
                    alert("申請成功！")
                </script>
            @endif
            <div class="align">
                <form id="RegisterForm" action="{{ route('rent.store') }}" enctype="multipart/form-data" method="POST">
                    <div class="mb-3">
                        <input class="form-control" id="name" name="name" type="text" placeholder="姓名 / Name"
                            data-sb-validations="required" value="{{ old('name') }}" />
                        <div class="invalid-feedback" data-sb-feedback="姓名:required">姓名 is required.</div>
                    </div>
                    <div class="mb-3" style="margin-top: 2rem">
                        <input class="form-control" id="born" name="born" type="text" onfocus="(this.type='date')"
                            onblur="(this.type='text')" onchange="myFraction()" placeholder="出生日期 / Date of Birth"
                            data-sb-validations="required" style="display:inline-block" />
                        <div class="invalid-feedback" data-sb-feedback="出生日期:required">出生日期 is required.</div>
                    </div>
                    <div class="mb-3" style="margin-top: 2rem">
                        <input class="form-control" id="email" name="email" type="email" placeholder="電子郵件 / Email Address"
                            data-sb-validations="required,email" value="{{ old('email') }}"
                            value="{{ old('email') }}" />
                        <div class="invalid-feedback" data-sb-feedback="emailAddress:required">Email Address is required.
                        </div>
                        <div class="invalid-feedback" data-sb-feedback="emailAddress:email">Email Address Email is not
                            valid.</div>
                    </div>
                    <div class="mb-3" style="margin-top: 2rem">
                        <input class="form-control" id="rent_period" name="rent_period" type="text"
                            placeholder="租期 (天數) / Lease Term" value="{{ old('rent_period') }}" />
                    </div>
                    <div class="mb-3" style="margin-top: 2rem">
                        <input class="form-control" id="phone" name="phone" type="text" placeholder="聯絡電話 / Phone"
                            data-sb-validations="required" value="{{ old('phone') }}" />
                    </div>
                    <div class="mb-3" style="margin-top: 2rem">
                        <input class="form-control" id="data" name="data" type="text"
                            title="上傳證明資料 (格式限：pdf) / Upload proof information (Format restrictions: pdf)"
                            placeholder="上傳證明資料 (格式限：pdf) / Upload proof information (Format restrictions: pdf)" onfocus="(this.type='file')" />
                    </div>
                    <div class="mb-3" style="margin-top: 2rem">
                        <input class="form-control" id="parent_name" name="parent_name" type="text" placeholder="監護人姓名" style="display: none" value="{{ old('parent_name') }}" />
                    </div>
                    <div class="mb-3" style="margin-top: 2rem">
                        <input class="form-control" id="parent_phone" name="parent_phone" type="text" placeholder="監護人電話" style="display: none" value="{{ old('parent_phone') }}" />
                    </div>
                    <div class="mb-3" style="margin-top: 2rem">
                        <input class="form-control" id="parent_relation" name="parent_relation" type="text"
                            placeholder="與監護人的關係 EX: 父子、母女、爺孫..." style="display: none"
                            value="{{ old('parent_relation') }}" />
                    </div>
                    <div class="d-none" id="submitSuccessMessage">
                        <div class="text-center mb-3">
                            <div class="fw-bolder">Form submission successful!</div>
                            <p>To activate this form, sign up at</p>
                            <a
                                href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                        </div>
                    </div>
                    <div class="d-none" id="submitErrorMessage">
                        <div class="text-center text-danger mb-3">Error sending message!</div>
                    </div>
                    <div style="margin-top: 2rem">
                        <a class="button" onclick="document.getElementById('RegisterForm').submit()" id="submitButton"
                            type="submit">送出</a>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
@endsection
@include('layouts.footer')
