@extends('layouts.first')

@section('content')
    <div class="index-bg">
        <div class="container pb-5">
            <div class="row">
                <div class="col-12 mb-5 mt-4">
                    <div class="dev-message">
                        <p>Сайт в разработке</p>
                        <small>Будет готов в начале ноября</small>
                    </div>
                    <h2 class="main-message">
                        Зарабатывать на международном валютном рынке <br>до <span>20%</span> <i>в месяц</i>  без каких-либо навыков уже сегодня?
                    </h2>
                    <h3 class="main-message">
                        Да, это возможно – с автоматизированными
                        <br>системами от нашей компании.
                    </h3>
                </div>
                <div class="col-12 col-md-4">
                    <h4 class="message--title">Специалисты <span>Sky</span><i>Robots</i>:</h4>
                    <ul>
                        <li>
                            консультируют вас по всем вопросам касательно торговли на рынках и помогают определиться со стратегией заработка;
                        </li>
                        <li>
                            кастомизируют под вашу стратегию и устанавливают торговую систему, в том числе открывают вам торговый счет;
                        </li>
                        <li>
                            обучают управлению торговой системой, если вы не разберетесь в ней сами (хотя интерфейс простой и интуитивно понятный);
                        </li>
                        <li>
                            сами контролируют работу торговой системы, если вы поручите им выполнение этой задачи.
                        </li>
                    </ul>
                </div>
                <div class="col-12 col-md-4">
                    <h4 class="message--title">Вы:</h4>
                    <ul>
                        <li>
                            приобретаете лицензию на пользование системой;
                        </li>
                        <li>
                            пополняете торговый счет у любого выбранного вами брокера любой суммой на ваше усмотрение;
                        </li>
                        <li>
                            в любой момент снимаете прибыль (она зарабатывается ежедневно);
                        </li>
                        <li>
                            сами регулируете остаток на торговом счете (ваши деньги не «замораживаются» и доступны к снятию в любой момент).
                        </li>
                    </ul>
                    <p class=pb-2">
                        Кстати, вот наш канал в Telegram: <span>@SkyDiverRobot</span>
                        <br>Тут тоже есть информация, и иногда появляются полезные новости.
                    </p>
                </div>
                <div class="col-12 col-md-4">
                    <h4 class="message--title">Интересно?</h4>
                    <p>Оставляйте контакты, пришлем подробности.</p>
                    <index-form action="{{ route('action.indexForm') }}" method="post"></index-form>
                </div>
            </div>
        </div>
    </div>
@endsection