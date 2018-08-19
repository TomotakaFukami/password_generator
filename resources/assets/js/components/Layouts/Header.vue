<template>
    <header class="page-container md-layout-column">
        <md-toolbar class="md-primary">
            <h1 class="md-title">Password Generator</h1>

            <div class="md-toolbar-section-end">
                <md-button @click="showSidepanel = true">
                    <md-icon>menu</md-icon>
                </md-button>
            </div>
        </md-toolbar>
        <md-drawer class="md-right" :md-active.sync="showSidepanel">
            <md-toolbar class="md-transparent" md-elevation="0">
                <span class="md-title">Favorites</span>
            </md-toolbar>

            <md-list>
                <md-list-item>
                    <md-icon>move_to_inbox</md-icon>
                    <span class="md-list-item-text">Inbox</span>
                </md-list-item>

                <md-list-item>
                    <md-icon>send</md-icon>
                    <span class="md-list-item-text">Sent Mail</span>
                </md-list-item>

                <md-list-item>
                    <md-icon>delete</md-icon>
                    <span class="md-list-item-text">Trash</span>
                </md-list-item>

                <md-list-item>
                    <md-icon>error</md-icon>
                    <span class="md-list-item-text">Spam</span>
                </md-list-item>
            </md-list>
        </md-drawer>
    </header>
</template>

<script>
    export default {
        name: 'Header',
        data: () => ({
            showNavigation: false,
            showSidepanel: false
        })
    }
</script>

<style lang="scss" scoped>
    h1.md-title {
        font-size: 24px;
        font-weight: bold;
    }
</style>
