@extends('layouts.master')
@extends('layouts.navbar')
@include('layouts.header')
@section('title')
    弱勢數位學習關懷平台
@endsection
@section('intro')
    <h2>弱勢數位學習關懷平台</h2>
    <p>確保有教無類、公平以及高品質的教育<br>
        提倡終身學習的資源</p>
@endsection
@section('background')https://url.chyanweb.com/1ds @endsection
@section('content')
    <!-- One -->
    <section class="spotlight style1 bottom">
        <span class="image fit main"><img src="https://url.chyanweb.com/09s" alt="" /></span>
        <div class="content">
            <div class="container">
                <div class="row">
                    <div class="col-4 col-12-medium">
                        <header>
                            <h2>優質教育</h2>
                            <p>確保有教無類、公平以及高品質的教育，及提倡終身學習</p>
                        </header>
                    </div>
                    <div class="col-4 col-12-medium">
                        <p>取得高品質教育為改善人們生活和永續發展的基礎，目前各層級之入學率皆提升，特別是女性的部分。
                            然而，發展遲緩和營養不良之問題在部分國家仍就阻礙了兒童及損害其學習能力，
                            甚而剝奪了更美好的未來，絕大多數未能就學的學齡兒童來自農村地區，且有數百萬兒童受困在農業童工。</p>
                    </div>
                    <div class="col-4 col-12-medium">
                        <p>與其他聯合國機構協調，已獲得支持改善初等教育機會；糧農組織協助各國建立學校園藝和學校供餐計畫——食物權立法和社會保護計畫。
                            期待計畫能鼓勵上學，為幼兒帶來直接的營養與身體發育的好處；並為整個社區帶來持久性的社會、經濟與環境效益。
                            而我們團隊也決定開發一個網站，網站裡我們提供設備的租借、提供電腦的使用教學課程以及線上和線下的輔導課程。
                        </p>
                    </div>
                </div>
            </div>
        </div>
        <a href="#two" class="goto-next scrolly">Next</a>
    </section>

    <!-- Two -->
    <section id="two" class="spotlight style2 right">
        <span class="image fit main"><img src="https://url.chyanweb.com/c13" alt="" /></span>
        <div class="content">
            <header>
                <h2>設備租借</h2>
                <p>高品質的教育，需要與科技接軌</p>
            </header>
            <p>在疫情下，遠距教學盛行，你愁於沒有電腦設備可以學習嗎？為了讓人人都能公平接受教育，在這裡你可以免費租借電腦，不管是學童或是年長者，只要你想學習，動動手指頭，我們就提供資源。</p>
            <ul class="actions">
                <li><a href="{{ route('rent.index') }}" class="button">Learn More</a></li>
            </ul>
        </div>
        <a href="#three" class="goto-next scrolly">Next</a>
    </section>

    <!-- Three -->
    <section id="three" class="spotlight style3 left">
        <span class="image fit main bottom"><img src="https://url.chyanweb.com/ae~" alt="" /></span>
        <div class="content">
            <header>
                <h2>志工服務</h2>
                <p>改善教育品質，從你我做起</p>
            </header>
            <p>現今農村地區的平均失學率為城市地區的2倍，約有1億位5~17歲的孩童被定義為農業中的童工。<br><br>
                他們不像我們有國民義務教育，但他們一樣有受教的權利，伸出你的雙手，貢獻你的能力，加入我們志工的行列吧！<br><br>
                你缺少學習資源嗎？在這裡我們提供各領域的志工，陪伴每個孩童學習與成長，我們將會配對最合適的志工，讓你對學習產生更大的熱忱。
            </p>
            <ul class="actions">
                <li><a href="/volunteer" class="button">Learn More</a></li>
            </ul>
        </div>
        <a href="#four" class="goto-next scrolly">Next</a>
    </section>

    <!-- Four -->
    <section id="four" class="wrapper style1 special fade-up">
        <div class="container">
            <header class="major">
                <h2>優質教育</h2>
                <p>細項目標</p>
            </header>
            <div class="box alt">
                <div class="row gtr-uniform">
                    <section class="col-3 col-6-medium col-12-xsmall">
                        <span class="icon solid major fa-chalkboard"></span>
                        <h3>免費中小學教育</h3>
                        <p>在西元2030年以前，確保所有的男女學子都完成免費的、公平的以及高品質的小學與中學教育，得到有關且有效的學習成果。</p>
                    </section>
                    <section class="col-3 col-6-medium col-12-xsmall">
                        <span class="icon solid major fa-book-reader"></span>
                        <h3>平等接受優質學前教育</h3>
                        <p>在西元2030年以前，確保所有的孩童都能接受高品質的早期幼兒教育、照護，以及小學前教育，因而為小學的入學作好準備。</p>
                    </section>
                    <section class="col-3 col-6-medium col-12-xsmall">
                        <span class="icon solid major fa-university"></span>
                        <h3>公平、負擔得起、技職及高品質的教育</h3>
                        <p>在西元2030年以前，確保所有的男女都有公平、負擔得起、高品質的技職、職業與高等教育的受教機會，包括大學。</p>
                    </section>
                    <section class="col-3 col-6-medium col-12-xsmall">
                        <span class="icon solid major fa-piggy-bank"></span>
                        <h3>新增擁有相關財務成功技能的人數</h3>
                        <p>在西元2030年以前，將擁有相關就業、覓得好工作與企業管理職能的年輕人與成人的人數增加，包括技術與職業技能。</p>
                    </section>
                    <section class="col-4 col-6-medium col-12-xsmall">
                        <span class="icon solid major fa-balance-scale"></span>
                        <h3>消除教育中的一切歧視</h3>
                        <p>在西元2030年以前，消除教育上的兩性不平等，確保弱勢族群有接受各階級教育的管道與職業訓練，包括身心障礙者、原住民以及弱勢孩童。</p>
                    </section>
                    <section class="col-4 col-6-medium col-12-xsmall">
                        <span class="icon solid major fa-shapes"></span>
                        <h3>識字比率及算數能力</h3>
                        <p>在西元2030年以前，確保所有的年輕人以及很大比例的成人，無論男女，都具備讀寫以及算術能力。</p>
                    </section>
                    <section class="col-4 col-6-medium col-12-xsmall">
                        <span class="icon solid major fa-infinity"></span>
                        <h3>永續發展與全球公民教育</h3>
                        <p>在西元2030年以前，確保所有的學子都習得必要的知識與技能而可以促進永續發展，包括永續發展教育、永續生活模式、人權、性別平等、和平及非暴力提倡、全球公民、文化差異欣賞，以及文化對永續發展的貢獻。
                        </p>
                    </section>
                    <section class="col-4 col-6-medium col-12-xsmall">
                        <span class="icon solid major fa-school"></span>
                        <h3>興建和升級具包容性、安全的學校</h3>
                        <p>建立及提升適合孩童、身心障礙者以及兩性的教育設施，並為所有的人提供安全的、非暴力的、有教無類的、以及有效的學習環境。</p>
                    </section>
                    <section class="col-4 col-6-medium col-12-xsmall">
                        <span class="icon solid major fa-file-invoice-dollar"></span>
                        <h3>擴大對開發中國家的高等教育獎學金</h3>
                        <p>在西元2020年以前，將全球開發中國家的獎學金數目增加，尤其是LDCs、SIDS與非洲國家，以提高高等教育的受教率，包括已開發國家與其他開發中國家的職業訓練、資訊與通信科技（以下簡稱ICT），技術的、工程的，以及科學課程。
                        </p>
                    </section>
                    <section class="col-4 col-6-medium col-12-xsmall">
                        <span class="icon solid major fa-chalkboard-teacher"></span>
                        <h3>新增開發中國家合格教師的供給</h3>
                        <p>在西元2030年以前，將合格師資人數增加x%，包括在開發中國家進行國際師資培訓合作，尤其是LDCs與SIDS</p>
                    </section>
                </div>
            </div>
        </div>
    </section>

    <!-- Five -->
    <section id="five" class="wrapper style2 special fade">
        <div class="container">
            <header>
                <meta name="viewport" content="width=device-width, initial-scale=1">
                <!-- Ensures optimal rendering on mobile devices. -->
                <meta http-equiv="X-UA-Compatible" content="IE=edge" />
                <!-- Optimal Internet Explorer compatibility -->
                <span style="font-size: 60px">贊助</span>
                <br> <br>
                <p>
                    如果認同我們團隊的核心思想——人人享有平等受教權，
                    非常歡迎直接以金錢支持我們的行動，
                </p>
                <p>
                    我們會提供接受我們援助的孩童學習歷程，讓每一位贊助者看的到這些孩童的成長，攜手創造更平等的教育世界。
                </p>
                <div id="smart-button-container">
                    <div style="text-align: center;">
                        <div style="margin-bottom: 1.00rem;">
                            <select id="item-options">
                                <option value="Donate" price="100">Donate - 100 TWD</option>
                                <option value="Donate" price="500">Donate - 500 TWD</option>
                                <option value="Donate" price="1000">Donate - 1000 TWD</option>
                            </select>
                            <select style="visibility: hidden" id="quantitySelect"></select>
                        </div>
                        <div id="paypal-button-container"></div>
                    </div>
                </div>
                <script src="https://www.paypal.com/sdk/js?client-id=sb&enable-funding=venmo&currency=TWD"
                                data-sdk-integration-source="button-factory"></script>
                <script>
                    function initPayPalButton() {
                        var shipping = 0;
                        var itemOptions = document.querySelector("#smart-button-container #item-options");
                        var quantity = parseInt();
                        var quantitySelect = document.querySelector("#smart-button-container #quantitySelect");
                        if (!isNaN(quantity)) {
                            quantitySelect.style.visibility = "visible";
                        }
                        var orderDescription = '';
                        if (orderDescription === '') {
                            orderDescription = 'Item';
                        }
                        paypal.Buttons({
                            style: {
                                shape: 'pill',
                                color: 'white',
                                layout: 'horizontal',
                                label: 'paypal',

                            },
                            createOrder: function(data, actions) {
                                var selectedItemDescription = itemOptions.options[itemOptions.selectedIndex].value;
                                var selectedItemPrice = parseFloat(itemOptions.options[itemOptions.selectedIndex]
                                    .getAttribute("price"));
                                var tax = (0 === 0) ? 0 : (selectedItemPrice * (parseFloat(0) / 100));
                                if (quantitySelect.options.length > 0) {
                                    quantity = parseInt(quantitySelect.options[quantitySelect.selectedIndex].value);
                                } else {
                                    quantity = 1;
                                }

                                tax *= quantity;
                                tax = Math.round(tax * 100) / 100;
                                var priceTotal = quantity * selectedItemPrice + parseFloat(shipping) + tax;
                                priceTotal = Math.round(priceTotal * 100) / 100;
                                var itemTotalValue = Math.round((selectedItemPrice * quantity) * 100) / 100;

                                return actions.order.create({
                                    purchase_units: [{
                                        description: orderDescription,
                                        amount: {
                                            currency_code: 'TWD',
                                            value: priceTotal,
                                            breakdown: {
                                                item_total: {
                                                    currency_code: 'TWD',
                                                    value: itemTotalValue,
                                                },
                                                shipping: {
                                                    currency_code: 'TWD',
                                                    value: shipping,
                                                },
                                                tax_total: {
                                                    currency_code: 'TWD',
                                                    value: tax,
                                                }
                                            }
                                        },
                                        items: [{
                                            name: selectedItemDescription,
                                            unit_amount: {
                                                currency_code: 'TWD',
                                                value: selectedItemPrice,
                                            },
                                            quantity: quantity
                                        }]
                                    }]
                                });
                            },
                            onApprove: function(data, actions) {
                                return actions.order.capture().then(function(details) {
                                    alert('Transaction completed by ' + details.payer.name.given_name + '!');
                                });
                            },
                            onError: function(err) {
                                console.log(err);
                            },
                        }).render('#paypal-button-container');
                    }
                    initPayPalButton();
                </script>
            </header>

        </div>
    </section>
@endsection
@include('layouts.footer')
