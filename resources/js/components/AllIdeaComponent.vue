<template>

    <main class="main">

        <div class="p-mypage">

            <h2 class="f-h2 allIdea">全アイデア</h2>

            <div class="c-button allIdea-button" v-show="this.search" @click="searching()">{{closingMessage}}</div>
            <div class="c-button allIdea-button" v-show="!this.search" @click="closeSearching()">{{openingMessage}}
            </div>

            <div class="search" v-show="!this.search">


                <h4>アイデア検索ボックス</h4>

                <div class="search-container">
                    <div class="search-subject allIdea-button-search" @click="categorySelect()">カテゴリ検索</div>
                    <div class="search-subject allIdea-button-search" @click="priceSelect()">価格検索</div>
                    <div class="search-subject allIdea-button-search" @click="dateSelect()">期間検索</div>
                </div>


                <div v-if="categorySelected" class="search-category">
                    <div class="search-subject">カテゴリ検索</div>

                    <input id="matching" name="category" type="radio">
                    <label for="matching" class="c-radio search-category-radio" @click="searchCategory(1)">マッチング</label>

                    <input id="board" name="category" class="" type="radio">
                    <label for="board" class="c-radio search-category-radio" @click="searchCategory(2)">掲示板</label>

                    <input id="sns" name="category" class="" type="radio">
                    <label for="sns" class="c-radio search-category-radio" @click="searchCategory(3)">SNS</label>

                    <input id="EC" name="category" class="" type="radio">
                    <label for="EC" class="c-radio search-category-radio" @click="searchCategory(4)">ECサイト</label>

                    <input id="infoplaner" name="category" class="" type="radio">
                    <label for="infoplaner" class="c-radio search-category-radio"
                           @click="searchCategory(5)">情報発信</label>

                    <input id="sharing" name="category" class="" type="radio">
                    <label for="sharing" class="c-radio search-category-radio" @click="searchCategory(6)">シェアリング</label>

                    <input id="other" name="category" class="" type="radio">
                    <label for="other" class="c-radio search-category-radio" @click="searchCategory(7)">その他</label>
                </div>

                <div v-if="priceSelected" class="search-price">
                    <div class="search-subject">価格検索</div>
                    <input class="search-price-input" @blur="priceSearch()" id="down" type="text"
                           v-model.number="higher">
                    <label for="down">円以上</label>
                    <input class="search-price-input" @blur="priceSearch()" id="top" type="text"
                           v-model.number="lower">
                    <label for="top">円以下</label>


                </div>

                <div v-if="dateSelected" class="search-date">
                    <div class="search-subject">期間検索</div>

                    <div class="search-date-box">
                        <label for="down">年別</label>
                        <v-date-picker :mode="mode"
                                       :format="customFormatter"
                                       @input="termYearSearch()"
                                       v-model="year"
                                       :language="ja"
                                       key="year"
                                       clearable
                                       minimum-view="`year`">
                        </v-date-picker>
                    </div>

                    <div class="search-date-box">
                        <label for="top">月別</label>
                        <v-date-picker :mode="mode"
                                       :format="customFormatter"
                                       @input="termMonthSearch()"
                                       v-model="month"
                                       key="month"
                                       clearable
                                       minimum-view="`month`">
                        </v-date-picker>
                    </div>

                    <div class="search-date-box">
                        <label for="top">日別</label>
                        <v-date-picker :mode="mode"
                                       :format="customFormatter"
                                       v-model="day"
                                       @input="termDaySearch()"
                                       key="day"
                                       minimum-view="'day'">
                        </v-date-picker>
                    </div>

                    <div class="search-date-box">
                        <label for="top">以降</label>
                        <v-date-picker :mode="mode"
                                       :format="customFormatter"
                                       v-model="after"
                                       @input="termSearch()"
                                       key="after">
                        </v-date-picker>
                    </div>
                    <div class="search-date-box">

                        <label for="top">以前</label>
                        <v-date-picker :mode="mode"
                                       :format="customFormatter"
                                       v-model="before"
                                       @input="termSearch()"
                                       key="before">
                        </v-date-picker>
                    </div>

                </div>
            </div>
        </div>


        <h3 class="f-h3">全アイデア</h3>

        <div class="error" v-if="errorMessage">{{noMatchMessage}}</div>
        <div class="error" v-if="priceErrorMessage">{{priceErrorMessage}}</div>



        <div v-if="!errorMessage">

            <div class="ic" v-if="this.ideas">


                <paginate name="paginate-log" :list="searchedIdeas" :per="15">
                    <div v-for="allIdea in paginated('paginate-log')" class="ic-card ic-all">
                        <router-link :to="{name:'postDetail', params:{
                        ideaId:allIdea.id,
                        userId:allIdea.user_id
                        }}" class="ic-a" href="#">

                            <h4 class="f-h4">{{allIdea.title}}</h4>
                            <div class="ic-img">
                                <img :src="`./img${allIdea.img}`" alt="idea" class="ic-img-item">
                            </div>

                            <label>カテゴリ</label>
                            <div>{{categoryName(allIdea.category_id)}}</div>

                            <label>価格</label>
                            <div>{{allIdea.price}}</div>

                            <div class="ic-review">
                                <label>平均評価</label>
                                <span class="ic-star-review" v-bind:class="star(allIdea.averageReview)"></span>
                                <span class v-if="star(allIdea.averageReview) === 'ic-not-reviewed'">未評価のアイデアです</span>
                                <label>レビュー数</label>
                                <div>{{allIdea.review_counts}}件です</div>
                            </div>


                            <div class="ic-desc-all">
                                <div class="ic-desc-overflow">概要</div>
                                <div class="ic-desc-text">
                                    {{allIdea.overflow.slice(0,48)}}
                                </div>
                            </div>

                            <label>投稿日</label>
                            <div>{{allIdea.created_at}}</div>
                        </router-link>
                    </div>
                </paginate>
            </div>

            <div class="pagination">
                <paginate-links for="paginate-log" class="pagination-container"
                                :show-step-links="true"></paginate-links>
            </div>
        </div>


    </main>

</template>

<script>

    export default {
        name: "AllIdeaComponent",

        data: function () {
            return {
                ideas: {},
                down: "",
                top: "",
                closingMessage: "検索する",
                openingMessage: "検索タブ閉じる",
                search: true,
                higher: "",
                lower: "",
                show: true,
                mode: 'single',
                selectedDate: null,
                format: {
                    DatePickerFormat: 'yyyy-MM-dd',
                },
                ja: {
                    language: 'Japanese',
                    months: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
                    monthsAbbr: ['1月', '2月', '3月', '4月', '5月', '6月', '7月', '8月', '9月', '10月', '11月', '12月'],
                    days: ['日', '月', '火', '水', '木', '金', '土'],
                    rtl: false,
                    ymd: 'yyyy-MM-dd',
                    yearSuffix: '年'
                },
                year: "",
                month: "",
                day: "",
                before: null,
                after: null,
                //paginate用
                paginate: ['paginate-log'],
                categorySelected: false,
                priceSelected: false,
                dateSelected: false,

                errorMessage: false,
                noMatchMessage: '条件に該当するアイデアがありませんでした'
            }
        },


        created() {
            this.$emit('open-loading');
            this.ideas = this.$store.dispatch('getUserIdeas');
        },

        mounted() {
            this.ideas = this.$store.state.ideas.allIdea;
            this.$emit('close-loading');

        },

        updated() {
        },

        filters: {
            customformat: function (value) {
                return moment(value).format('YYYY-MM-DD');
            }
        },
        // beforeUpdate() {
        //     this.$emit('close-loading');
        // },

        methods: {

            reset: function () {
                this.year = "".thie.month = ""
            },

            customFormatter(date) {
                return moment(date).format('YYYY-MM-DD');
            },


            categoryName: function (id) {
                if (id === 1) {
                    return 'マッチング'

                } else if (id === 2) {
                    return '掲示板'
                } else if (id === 3) {
                    return 'SNS'
                } else if (id === 4) {
                    return 'ECサイト'
                } else if (id === 5) {
                    return '情報発信'
                } else if (id === 6) {
                    return 'シェアリング'
                } else if (id === 7) {
                    return 'その他'
                }
            },


            searching: function () {
                this.search = !this.search;
            },

            closeSearching: function () {
                this.search = !this.search;
            },

            //検索切り替え
            categorySelect: function () {
                this.categorySelected = true;
                this.priceSelected = false;
                this.dateSelected = false;
            },

            priceSelect: function () {
                this.categorySelected = false;
                this.priceSelected = true;
                this.dateSelected = false;
            },
            dateSelect: function () {
                this.categorySelected = false;
                this.priceSelected = false;
                this.dateSelected = true;
            },

            /**
             * カテゴリー検索機能
             * @param category_id
             * @returns {ideas|{}}
             */
            searchCategory: function (category_id) {
                this.$emit('open-loading');


                axios.get('/api/categorySearch', {
                    params: {
                        categoryId: category_id
                    }
                })
                    .then(response => {
                        console.log(response.data.categoryIdea)
                        if (response.data.categoryIdea.length === 0) {
                            this.errorMessage = true
                        } else {
                            this.ideas = response.data.categoryIdea
                            this.errorMessage = false
                        }
                        this.$emit('close-loading');
                    }).catch((error) => {
                    console.log(error)
                    this.$emit('close-loading');
                })


            },


            priceSearch: function () {
                this.errorMessage = false;
                this.priceErrorMessage = false;

                /**
                 * 以上の方にのみ入力値存在する
                 * 入力値以上の値段のアイデアを取得
                 */
                if (this.higher !== null && this.lower === "") {

                    if (Number.isFinite(this.higher) === false) {
                        this.priceErrorMessage = "半角数字で入力してください"
                    } else
                        this.$emit('open-loading');
                    axios.get('/api/priceSearch/higher', {
                        params: {
                            higherPrice: this.higher
                        }
                    })
                        .then(response => {
                            console.log(response.data.higherIdea)
                            if (response.data.higherIdea.length === 0) {

                                this.searchedNoItems()

                            } else if (response.data.higherIdea.length !== 0) {
                                this.ideas = response.data.higherIdea
                                this.errorMessage = false
                                this.$emit('close-loading');

                            }
                        }).catch((error) => {
                        console.log(error)
                        this.$emit('close-loading');

                    })
                }

                /**
                 * 円以下の方にだけ入力値存在する
                 * 入力値以下値段のアイデアを取得
                 */
                else if (this.higher === "" && this.lower !== null) {
                    if (Number.isFinite(this.lower) === false) {
                        this.priceErrorMessage = "半角数字で入力してください"
                    } else {
                        this.$emit('open-loading');
                        axios.get('/api/priceSearch/lower', {
                            params: {
                                lowerPrice: this.lower
                            }
                        })
                            .then(response => {
                                console.log(response)
                                if (response.data.lowerIdea.length === 0) {

                                    this.searchedNoItems()

                                } else if (response.data.lowerIdea.length !== 0)
                                    this.ideas = response.data.lowerIdea
                                this.errorMessage = false
                                this.$emit('close-loading');
                            }).catch((error) => {
                            console.log(error)
                            this.$emit('close-loading');

                        })
                    }
                }
                /**
                 * 両方の入力値存在する
                 * 入力値以上と以下の間の値段のアイデアを取得
                 */
                else if (this.higher !== null && this.lower !== null) {
                    if (Number.isFinite(this.lower) === false || Number.isFinite(this.higher) === false) {
                        this.priceErrorMessage = "半角数字で入力してください"
                    } else {
                        this.$emit('open-loading');
                        axios.get('/api/priceSearch/middle', {
                            params: {
                                lowerPrice: this.lower,
                                higherPrice: this.higher
                            }
                        })
                            .then(response => {
                                console.log(response.data.middleIdea)
                                if (response.data.middleIdea.length === 0) {
                                    this.searchedNoItems()
                                } else if (response.data.middleIdea.length !== 0) {
                                    this.$emit('close-loading');
                                    this.errorMessage = false;
                                    this.ideas = response.data.middleIdea;
                                }
                            }).catch((error) => {
                            console.log(error)
                            this.$emit('close-loading');
                        })
                    }
                }

        },
            termYearSearch: function () {
                this.$emit('open-loading');
                this.month = "";
                this.day = "";
                this.before = "";
                this.after = "";
                if (this.year !== "") {
                    this.termSearch()
                    this.$nextTick(() => {
                        this.year = ""
                        this.search = true
                    })
                }
                this.$emit('close-loading');
            },

            termMonthSearch: function () {
                this.$emit('open-loading');
                this.year = "";
                this.day = "";
                this.before = "";
                this.after = "";
                if (this.month !== "") {
                    this.termSearch()
                    this.$nextTick(() => {
                        this.month = ""
                        this.search = true
                    })
                }
                this.$emit('close-loading');

            },

            termDaySearch: function () {
                this.$emit('open-loading');
                this.year = "";
                this.month = "";
                this.before = "";
                this.after = "";
                if (this.day !== "") {
                    this.termSearch()
                    this.$nextTick(() => {
                        this.day = ""
                        this.search = true
                    })
                }
                this.$emit('close-loading');

            },

            termSearch: function () {
                this.$emit('open-loading');
                this.errorMessage = false;


                /**
                 * yearにのみ入力値存在する
                 * 入力値以前の期間のアイデアを取得
                 */
                if (this.year !== "" && this.month === "" && this.day === "") {
                    axios.get('/api/termSearch/year', {
                        params: {
                            year: this.year
                        }
                    })
                        .then(response => {
                            console.log(response)
                            this.$emit('close-loading');
                            if (response.data.yearIdea.length === 0) {
                                this.errorMessage = true
                            } else if (response.data.yearIdea.length !== 0) {
                                this.ideas = response.data.yearIdea
                                this.errorMessage = false;
                            }
                        }).catch((error) => {
                        console.log(error)
                        this.$emit('close-loading');
                    })
                }

                /**
                 * monthにのみ入力値存在する
                 * 入力値以前の期間のアイデアを取得
                 */
                else if (this.year === "" && this.month !== "" && this.day === "") {
                    axios.get('/api/termSearch/month', {
                        params: {
                            month: this.month
                        }
                    })
                        .then(response => {
                            console.log(response)
                            this.$emit('close-loading');
                            if (response.data.monthIdea.length === 0) {
                                this.errorMessage = true
                            } else if (response.data.monthIdea.length !== 0) {
                                this.ideas = response.data.monthIdea
                                this.errorMessage = false;
                            }
                        }).catch((error) => {
                        console.log(error)
                        this.$emit('close-loading');
                    })
                }

                /**
                 * dayにのみ入力値存在する
                 * 入力値以前の期間のアイデアを取得
                 */
                else if (this.year === "" && this.month === "" && this.day !== "") {
                    axios.get('/api/termSearch/day', {
                        params: {
                            day: this.day
                        }
                    })
                        .then(response => {
                            console.log(response)
                            this.$emit('close-loading');
                            if (response.data.dayIdea.length === 0) {
                                this.errorMessage = true
                            } else if (response.data.dayIdea.length !== 0) {
                                this.ideas = response.data.dayIdea
                                this.errorMessage = false;
                            }
                        }).catch((error) => {
                        console.log(error)
                        this.$emit('close-loading');
                    })
                }

                /**
                 * 以降のデータ検索
                 * afterにのみ入力値存在する
                 */
                else if (this.before === null && this.after !== null) {
                    axios.get('/api/termSearch/after', {
                        params: {
                            after: this.after
                        }
                    })
                        .then(response => {
                            this.$emit('close-loading');
                            console.log(response)
                            if (response.data.afterIdea.length === 0) {
                                this.errorMessage = true
                            } else if (response.data.afterIdea.length !== 0) {
                                this.ideas = response.data.afterIdea
                                this.errorMessage = false;
                            }
                        }).catch((error) => {
                        console.log(error)
                        this.$emit('close-loading');

                    })
                }



                /**
                 * 以前のデータ検索
                 *
                 *beforeにのみ入力値存在する
                 */
                else if (this.before !== null && this.after === null) {
                    axios.get('/api/termSearch/before', {
                        params: {
                            before: this.before
                        }
                    })
                        .then(response => {
                            this.$emit('close-loading');
                            console.log(response)
                            if (response.data.beforeIdea.length === 0) {
                                this.errorMessage = true
                            } else if (response.data.beforeIdea.length !== 0) {
                                this.ideas = response.data.beforeIdea
                                this.errorMessage = false;
                            }
                        }).catch((error) => {
                        console.log(error)
                        this.$emit('close-loading');
                    })
                }


                /**
                 * 両方に入力値存在する
                 * 入力値の間の値段のアイデアを取得
                 */
                else if (this.before !== null && this.after !== null) {
                    axios.get('/api/termSearch/middle', {
                        params: {
                            before: this.before,
                            after: this.after
                        }
                    })
                        .then(response => {
                            this.$emit('close-loading');
                            console.log(response)
                            if (response.data.middleIdea.length === 0) {
                                this.errorMessage = true
                            } else if (response.data.middleIdea.length !== 0) {
                                this.ideas = response.data.middleIdea
                                this.errorMessage = false;
                            }
                        }).catch((error) => {
                        console.log(error)
                        this.$emit('close-loading');
                    })
                } else if(this.before === null && this.after === null){
                    this.ideas = this.$store.state.ideas.allIdea;
                    this.$emit('close-loading');
            }
            },


        },

        computed: {

            searchedIdeas: function () {
                return this.ideas;
            },


            star: function () {


                return function (stars) {

                    var starReview = stars;

                    if (starReview === 0) {
                        return "ic-not-reviewed";
                    } else if (starReview <= 0.5) {
                        return "rate0-5"
                    } else if (starReview > 0.5 && starReview <= 1) {
                        return "rate1"
                    } else if (starReview > 1 && starReview <= 1.5) {
                        return "rate1-5"
                    } else if (starReview > 1.5 && starReview <= 2) {
                        return "rate2"
                    } else if (starReview > 2 && starReview <= 2.5) {
                        return "rate2-5"
                    } else if (starReview > 2.5 && starReview <= 3) {
                        return "rate3"
                    } else if (starReview > 3 && starReview <= 3.5) {
                        return "rate3-5"
                    } else if (starReview > 3.5 && starReview <= 4) {
                        return "rate4"
                    } else if (starReview > 4 && starReview <= 4.5) {
                        return "rate4-5"
                    } else if (starReview > 4.5 && starReview <= 5) {
                        return "rate5"
                    }
                }
            },


        },


    }
</script>

<style scoped>

    .ic >>> ul {
        display: flex;
        width: 100%;
        margin: 5% auto;
        flex-wrap: wrap;
    }

    .pagination >>> ul {
        display: flex;
        font-size: 24px;
        justify-content: center;
        list-style: none;
    }

    .pagination >>> li {
        margin: 0 2%;
    }

    .pagination-container >>> a {
        color: black;
    }

    main >>> input[type="input"] {
        border: pink solid;
        box-shadow: 3px 3px 3px rgba(0, 0, 0, 0.2);
        font-size: 18px;
    }


</style>
