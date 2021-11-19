<template>
    <main id="main-container">
        <div class="content">
            <div class="row">
                <div class="col-12">
                    <div class="block block-rounded">
                        <div class="block-header block-header-default">
                            <h3 class="block-title">Summary Overview</h3>
                            <div class="block-options">
                                <button type="button" class="btn-block-option"
                                        data-toggle="block-option" data-action="state_toggle"
                                        data-action-mode="demo">
                                    <i class="si si-refresh"></i>
                                </button>
                            </div>
                        </div>
                        <div class="block-content block-content-full">
                            <div id="property-dashboard-section" class="block block-rounded">
                                <div class="block-header">
                                    <h3 class="block-title">Search Property</h3>
                                </div>
                                <div class="block-content block-content-full">
                                    <div class="dropdown">
                                        <button @click="myFunction" class="dropbtn">Dropdown</button>
                                        <div id="myDropdown" class="dropdown-content" v-if="locations">
                                            <input type="text" placeholder="Search.." id="myInput" @keyup="filterFunction">
                                            <router-link to="" v-for="location in locations">{{location.name}}</router-link>
<!--                                            <a href="#about">About</a>-->
<!--                                            <a href="#base">Base</a>-->
<!--                                            <a href="#blog">Blog</a>-->
<!--                                            <a href="#contact">Contact</a>-->
<!--                                            <a href="#custom">Custom</a>-->
<!--                                            <a href="#support">Support</a>-->
<!--                                            <a href="#tools">Tools</a>-->
                                        </div>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
</template>

<script>
import {getLocationsByCityId} from "../../composables/property";

export default {
    name: "SearchProperty",
    setup(){
        const locations = getLocationsByCityId(4);
        function myFunction() {
            document.getElementById("myDropdown").classList.toggle("show");
        }

        function filterFunction() {
            var input, filter, ul, li, a, i;
            input = document.getElementById("myInput");
            filter = input.value.toUpperCase();
           let div = document.getElementById("myDropdown");
            a = div.getElementsByTagName("a");
            for (i = 0; i < a.length; i++) {
               let txtValue = a[i].textContent || a[i].innerText;
                if (txtValue.toUpperCase().indexOf(filter) > -1) {
                    a[i].style.display = "";
                } else {
                    a[i].style.display = "none";
                }
            }
        }
        return{
            locations,
            myFunction,
            filterFunction
        }
    }
}
</script>

<style scoped>
.dropbtn {
    background-color: #04AA6D;
    color: white;
    padding: 16px;
    font-size: 16px;
    border: none;
    cursor: pointer;
}

.dropbtn:hover, .dropbtn:focus {
    background-color: #3e8e41;
}

#myInput {
    box-sizing: border-box;
    background-image: url('searchicon.png');
    background-position: 14px 12px;
    background-repeat: no-repeat;
    font-size: 16px;
    padding: 14px 20px 12px 45px;
    border: none;
    border-bottom: 1px solid #ddd;
}

#myInput:focus {outline: 3px solid #ddd;}

.dropdown {
    position: relative;
    display: inline-block;
}

.dropdown-content {
    display: none;
    position: absolute;
    background-color: #f6f6f6;
    min-width: 230px;
    overflow: auto;
    border: 1px solid #ddd;
    z-index: 1;
}

.dropdown-content a {
    color: black;
    padding: 12px 16px;
    text-decoration: none;
    display: block;
}

.dropdown a:hover {background-color: #ddd;}

.show {display: block;}
</style>
