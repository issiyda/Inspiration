<template>

        <main class ="main">

            <div class="p-mypage">

                <h2 class ="f-h2 allIdea">全アイデア</h2>

                <div class ="c-button allIdea-button" v-show="this.search" @click="searching()">{{message}}</div>
                <div class ="c-button allIdea-button" v-show="!this.search" @click="closeSearching()">{{message}}</div>

                <div class="search" v-show="!this.search">


                    <h4>アイデア検索ボックス</h4>
                    <div class="search-container">
                    <div class ="search-category">
                        <div class ="search-subject">カテゴリ検索</div>


                        <input id="matching" name="category"  type="radio">
                        <label for="matching" class="c-radio search-category-radio" @click="searchCategory(1)">マッチング</label>

                        <input id="board" name="category" class ="" type="radio">
                        <label for="board" class="c-radio search-category-radio" @click="searchCategory(2)">掲示板</label>

                        <input id="sns" name="category" class ="" type="radio">
                        <label for="sns" class="c-radio search-category-radio" @click="searchCategory(3)">SNS</label>

                        <input id="EC"  name="category" class ="" type="radio">
                        <label for="EC" class="c-radio search-category-radio" @click="searchCategory(4)">ECサイト</label>

                        <input id="infoplaner"  name="category" class ="" type="radio">
                        <label for="infoplaner" class="c-radio search-category-radio" @click="searchCategory(5)">情報発信</label>

                        <input id="other"  name="category" class ="" type="radio">
                        <label for="other" class="c-radio search-category-radio" @click="searchCategory(6)">その他</label>
                    </div>

                    <div class ="search-price">
                        <div class ="search-subject">価格検索</div>
                        <label for="down">以上</label>
                        <input class ="search-price-input"   @blur="priceSearch()" id="down" type="number" v-model.number="higher">
                        <label for="top">以下</label>
                        <input class ="search-price-input"  @blur="priceSearch()" id="top" type="number" v-model.number="lower">
                        <input id="price"  name="category" class ="" type="radio">
                    </div>

                    <div class ="search-date">
                        <div class ="search-subject">期間検索</div>
<!--                        　<input type="date" name="from" placeholder="〜から">-->
<!--                        　<input type="date" name="from" placeholder="〜まで">-->
<!--                        <button type="submit" @click="dateSearch">日付検索</button>-->
                        <label for="down">年別</label>
                        <v-date-picker :mode="mode"
                                       :format="customFormatter"
                                       v-model="year"
                                       :language="ja"
                                       minimum-view="year">
                        </v-date-picker>

                        <label for="top">月別</label>
                        <v-date-picker :mode="mode"
                                       :format="customFormatter"
                                       v-model="month"
                                       minimum-view="month">
                        </v-date-picker>

                        <label for="top">日別</label>
                        <v-date-picker :mode="mode"
                                       :format="customFormatter"
                                       v-model="day">
                        </v-date-picker>

                        <label for="top">以降</label>
                        <v-date-picker :mode="mode"
                                       :format="customFormatter"
                                       v-model="after">
                        </v-date-picker>

                        <label for="top">以前</label>
                        <v-date-picker :mode="mode"
                                       :format="customFormatter"
                                       v-model="before">
                        </v-date-picker>




                        <!--                        <v-date-picker :mode="mode"-->
<!--                                       :format="customFormatter"-->
<!--                                       @closed="pickerClosed"-->
<!--                                       name="day"-->
<!--                                       v-model="day">-->
<!--                        </v-date-picker>-->

<!--                        <v-date-picker :mode="mode"-->
<!--                                       :format="customFormatter"-->
<!--                                       @closed="pickerClosed"-->
<!--                                       name="day"-->
<!--                                       v-model="day">-->
<!--                        </v-date-picker>-->

                    </div>

                    </div>

                </div>




                <h3 class ="f-h3">全アイデア</h3>


                <div class="ic">


                    <div class="ic-card" v-for="allIdea in this.ideas">
                        <router-link :to="{name:'postDetail', params:{
                        id:allIdea.id,
                        ideaUserId:allIdea.user_id
                        }}" class ="ic-a" href="#">

                            <h4 class ="f-h4">{{allIdea.title}}</h4>
                            <div class="ic-img">
                                <!--                            <img src="../images/staff6.jpg" alt="idea" class="ic-img-item">-->
                            </div>

                            <label>カテゴリ</label>
                            <div>{{categoryName(allIdea.category_id)}}</div>

                            <label>価格</label>
                            <div>{{allIdea.price}}</div>
                            <div class="ic-review">
                                <span class ="ic-span">評価</span>
                                <i class="fas fa-star ic-star"></i>
                                <i class="fas fa-star ic-star"></i>
                                <i class="fas fa-star ic-star"></i>
                                <i class="fas fa-star ic-star"></i>
                                <i class="fas fa-star ic-star"></i>
                            </div>
                            <div class="ic-desc">
                                <div class ="ic-desc-overflow">概要</div>
                                <div class="ic-desc-text">
                                    {{allIdea.overflow}}
                                </div>
                            </div>

                            <label>投稿日</label>
                            <div>{{allIdea.created_at}}</div>
                        </router-link>
                    </div>
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
                message: "検索する",
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
                before: "",
                after: ""


            }
        },

        mounted() {
            this.ideas = this.$store.state.ideas.allIdea;
        },

        created() {
            this.ideas = this.$store.dispatch('getUserIdeas');

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
                } else {
                    return 'その他'
                }
            },


            searching: function () {
                this.search = !this.search;
                this.message = "検索タブ閉じる"

            },

            /**
             * カテゴリー検索機能
             * @param category_id
             * @returns {ideas|{}}
             */
            searchCategory: function (category_id) {

                axios.get('/api/categorySearch', {
                    params: {
                        categoryId: category_id
                    }
                })
                    .then(response => {
                        console.log(response)
                        this.ideas = response.data.categoryIdea
                    }).catch((error) => {
                    console.log(error)
                })


            },


            priceSearch: function () {

                /**
                 * 以上の方にのみ入力値存在する
                 * 入力値以上の値段のアイデアを取得
                 */
                if (this.higher !== null && this.lower === "") {
                    axios.get('/api/priceSearch/higher', {
                        params: {
                            higherPrice: this.higher
                        }
                    })
                        .then(response => {
                            console.log(response)
                            this.ideas = response.data.higherIdea
                        }).catch((error) => {
                        console.log(error)
                    })
                }
                /**
                 * 以下の方にのみ入力値存在する
                 * 入力値以下値段のアイデアを取得
                 */
                else if (this.higher === "" && this.lower !== null) {
                    axios.get('/api/priceSearch/lower', {
                        params: {
                            lowerPrice: this.lower
                        }
                    })
                        .then(response => {
                            console.log(response)
                            this.ideas = response.data.lowerIdea
                        }).catch((error) => {
                        console.log(error)
                    })
                }
                /**
                 * 両方の入力値存在する
                 * 入力値以上と以下の間の値段のアイデアを取得
                 */
                else if (this.higher !== null && this.lower !== null) {
                    axios.get('/api/priceSearch/middle', {
                        params: {
                            lowerPrice: this.lower,
                            higherPrice: this.higher
                        }
                    })
                        .then(response => {
                            console.log(response)
                            this.ideas = response.data.middleIdea
                        }).catch((error) => {
                        console.log(error)
                    })
                }

            },

            TermSearch: function () {
                /**
                 * yearにのみ入力値存在する
                 * 入力値以前の期間のアイデアを取得
                 */
                if (this.year !== "") {
                    axios.get('/api/termSearch/year', {
                        params: {
                            year: this.year
                        }
                    })
                        .then(response => {
                            console.log(response)
                            this.ideas = response.data.yearIdea
                        }).catch((error) => {
                        console.log(error)
                    })
                    }

                /**
                 * monthにのみ入力値存在する
                 * 入力値以前の期間のアイデアを取得
                 */
                if (this.month !== "") {
                    axios.get('/api/termSearch/month', {
                        params: {
                            month: this.month
                        }
                    })
                        .then(response => {
                            console.log(response)
                            this.ideas = response.data.monthIdea
                        }).catch((error) => {
                        console.log(error)
                    })
                }

                /**
                 * dayにのみ入力値存在する
                 * 入力値以前の期間のアイデアを取得
                 */
                if (this.day !== "") {
                    axios.get('/api/termSearch/day', {
                        params: {
                            day: this.day
                        }
                    })
                        .then(response => {
                            console.log(response)
                            this.ideas = response.data.dayIdea
                        }).catch((error) => {
                        console.log(error)
                    })
                }

                /**
                 * 以降のデータ検索
                 * afterにのみ入力値存在する
                 */
                if (this.before === "" && this.after !== "") {
                    axios.get('/api/termSearch/after', {
                        params: {
                            after: this.after
                        }
                    })
                        .then(response => {
                            console.log(response)
                            this.ideas = response.data.afterIdea
                        }).catch((error) => {
                        console.log(error)
                    })
                }



                /**
                 * 以前のデータ検索
                 *
                 *beforeにのみ入力値存在する
                 */
                if (this.before !== null && this.after === null) {
                    axios.get('/api/termSearch/before', {
                        params: {
                            before: this.before
                        }
                    })
                        .then(response => {
                            console.log(response)
                            this.ideas = response.data.beforeIdea
                        }).catch((error) => {
                        console.log(error)
                    })
                }


                /**
                     * 両方に入力値存在する
                     * 入力値の間の値段のアイデアを取得
                     */
                    if (this.before !== "" && this.after !== ""  ) {
                        axios.get('/api/termSearch/middle', {
                            params: {
                                before: this.before,
                                after: this.after
                            }
                        })
                            .then(response => {
                                console.log(response)
                                this.ideas = response.data.middleIdea
                            }).catch((error) => {
                            console.log(error)
                        })
                    }


            },


            closeSearching: function () {
                this.search = !this.search;
                this.message = "検索する"
            }

        },



        watch:{
            year:function(){
                this.month="";
                this.day="";
                this.before="";
                this.after="";
                this.TermSearch()
            },
            month:function(){
                this.year="";
                this.day="";
                this.before="";
                this.after="";
                this.TermSearch()

            },
            day:function(){
                this.year="";
                this.month="";
                this.before="";
                this.after="";
                this.TermSearch()
            },
            before:function(){
                this.year="";
                this.month="";
                this.day="";
                this.TermSearch()
            },
            after:function(){
                this.year="";
                this.month="";
                this.day="";
                this.TermSearch()
            },
        }


    }
</script>

<style scoped>


</style>
