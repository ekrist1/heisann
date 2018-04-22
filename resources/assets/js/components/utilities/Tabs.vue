<template>
    <div>
        <div class="tabs">
            <ul class="list-reset flex border-b border-l border-t border-r">
                <li class="-mb-px" v-for="tab in tabs" :key="tab.id" :class="isActivated(tab) ? 'bg-grey-light' : 'bg-white'">
                    <a v-if="tab.name !== 'Sikkerhet'" class="inline-block py-2 px-4 text-grey-darker font-semibold" @click="selectTab(tab)">
                        {{ tab.name }}
                    </a>
                    <a v-if="tab.name === 'Sikkerhet'" class="inline-block py-2 px-4 text-white font-semibold" @click="selectTab(tab)">
                        <svg fill="#2779BD" height="18" viewBox="0 0 24 24" width="18" xmlns="http://www.w3.org/2000/svg">
                            <path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm0 10.99h7c-.53 4.12-3.28 7.79-7 8.94V12H5V6.3l7-3.11v8.8z"/>
                            <path d="M0 0h24v24H0z" fill="none"/>
                        </svg>
                    </a>
                </li>
            </ul>
        </div>
    </div>

</template>

<script>
    export default {
        props: {
            tabsInitial: {
                type: Array,
            }
        },
        data () {
            return {
                tabs: this.tabsInitial,
                selectedTabIndex: 0,
            }
        },
        methods: {
            selectTab(tab) {
                this.selectedTabIndex = tab.id;
                this.$eventHub.$emit('showTabContentIndex', tab)
            },

            isActivated(tab) {
                return tab.id === this.selectedTabIndex;
            }
        }
    }
</script>