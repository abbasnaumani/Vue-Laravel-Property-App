<template>
    <div class="content">
        <!-- Row-01 -->
        <div class="row">
            <div class="col-6 col-sm-4 col-md-2 col-lg-2" >
<!--                <checkin-html></checkin-html>-->
            </div>
            <div class="col-6 col-sm-4 col-md-2 col-lg-2" >
<!--                <checkout-html></checkout-html>-->
            </div>
            <div class="col-6 col-sm-4 col-md-2 col-lg-2">
                <a class="block block-rounded block-link-shadow text-center bg-danger" href="javascript:void(0)">
                    <div class="block-content block-content-full">
                        <div class="font-size-h3 text-light">0</div>
                    </div>
                    <div class="block-content py-2 bg-body-light">
                        <p class="font-w600 font-size-sm text-muted mb-0">
                            Absent
                        </p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-sm-4 col-md-2 col-lg-2">
                <a class="block block-rounded block-link-shadow text-center bg-danger" href="javascript:void(0)">
                    <div class="block-content block-content-full">
                        <div class="font-size-h3 text-light">0</div>
                    </div>
                    <div class="block-content py-2 bg-body-light">
                        <p class="font-w600 font-size-sm text-muted mb-0">
                            Missing Punches
                        </p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-sm-4 col-md-2 col-lg-2">
                <a class="block block-rounded block-link-shadow text-center bg-warning" href="javascript:void(0)">
                    <div class="block-content block-content-full">
                        <div class="font-size-h3 text-light">0</div>
                    </div>
                    <div class="block-content py-2 bg-body-light">
                        <p class="font-w600 font-size-sm text-muted mb-0">
                            Short Duration
                        </p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-sm-4 col-md-2 col-lg-2">
                <a class="block block-rounded block-link-shadow text-center bg-warning" href="javascript:void(0)">
                    <div class="block-content block-content-full">
                        <div class="font-size-h3 text-light">0</div>
                    </div>
                    <div class="block-content py-2 bg-body-light">
                        <p class="font-w600 font-size-sm text-muted mb-0">
                            Late Arrivals
                        </p>
                    </div>
                </a>
            </div>
            <div class="col-6 col-sm-4 col-md-2 col-lg-2">
                <a class="block block-rounded block-link-shadow text-center bg-warning" href="javascript:void(0)">
                    <div class="block-content block-content-full">
                        <div class="font-size-h3 text-light">0</div>
                    </div>
                    <div class="block-content py-2 bg-body-light">
                        <p class="font-w600 font-size-sm text-muted mb-0">
                            Early Left
                        </p>
                    </div>
                </a>
            </div>
        </div>
        <!-- /Row-01 -->

        <!-- Row-02 -->
        <div class="row row-deck">
            <div class="col-6 col-sm-4 col-md-3 col-xl-3">
                <div class="block block-rounded d-flex flex-column">

                    <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                        <dt class="font-size-h3 font-w600 text-dark text-center">Leaves Summary</dt>
                    </div>

                    <div id="jQuery" class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center bg-info">
                        <dl class="mb-0">
                            <dd class="text-muted mb-0">
<!--                                <p class="text-light"> This Month : {{monthlyCheckins}} </p>-->
                            </dd>
                            <dd class="text-muted mb-0">
<!--                                <p class="text-light"> Previous Month : {{previousMonthCheckins}} </p>-->
                            </dd>
                            <dd class="text-muted mb-0">
<!--                                <p class="text-light"> Current Week : {{currentWeekCheckins}} </p>-->
                            </dd>
                            <dd class="text-muted mb-0">
<!--                                <p class="text-light"> Past Week : {{pastWeekCheckins}} </p>-->
                            </dd>
                        </dl>
                    </div>
                    <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                        <a class="font-w500 d-flex align-items-center" href="javascript:void(0)">
                            View all leaves summary.
                            <i class="fa fa-arrow-alt-circle-right ml-1 opacity-25 font-size-base"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-6 col-sm-4 col-md-3 col-xl-3">
                <div class="block block-rounded d-flex flex-column">
                    <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                        <dt class="font-size-h3 font-w600 text-dark text-center">Total Leaves</dt>
                    </div>
                    <div class="block-content block-content-full flex-grow-1 flex-column d-flex justify-content-center align-items-center bg-secondary">
                        <p class="text-light text-center font-size-h2 font-w700">0</p>
                        <p class="text-light text-center font-size-h2 font-w700">Leaves</p>
                        <!-- <div class="item item-rounded bg-body">
                            <i class="fa fa-shopping-cart font-size-h3 text-primary"></i>
                        </div> -->
                    </div>
                    <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                        <a class="font-w500 d-flex align-items-center" href="javascript:void(0)">
                            View all Leaves
                            <i class="fa fa-arrow-alt-circle-right ml-1 opacity-25 font-size-base"></i>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-6 col-sm-4 col-md-3 col-xl-3">
                <div class="block block-rounded d-flex flex-column">
                    <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                        <!-- <a class="font-w500 d-flex align-items-center" href="javascript:void(0)">
                            Leaves Summary
                            <i class="fa fa-arrow-alt-circle-right ml-1 opacity-25 font-size-base"></i>
                        </a> -->
                        <dt class="font-size-h3 font-w600 text-dark text-center">Total Presents</dt>
                    </div>
                    <div class="block-content block-content-full flex-grow-1 flex-column d-flex justify-content-center align-items-center bg-success">
                        <p class="text-light text-center font-size-h2 font-w700">0</p>
                        <p class="text-light text-center font-size-h2 font-w700">Presents</p>
                        <!-- <div class="item item-rounded bg-body">
                            <i class="fa fa-shopping-cart font-size-h3 text-primary"></i>
                        </div> -->
                    </div>
                    <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                        <a class="font-w500 d-flex align-items-center" href="javascript:void(0)">
                            View all Presents
                            <i class="fa fa-arrow-alt-circle-right ml-1 opacity-25 font-size-base"></i>
                        </a>
                    </div>
                </div>
            </div>

            <div class="col-6 col-sm-4 col-md-3 col-xl-3">
                <div class="block block-rounded d-flex flex-column">
                    <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm bg-warning">
                        <!-- <a class="font-w500 d-flex align-items-center" href="javascript:void(0)">
                            View all Presents
                            <i class="fa fa-arrow-alt-circle-right ml-1 opacity-25 font-size-base"></i>
                        </a> -->
                        <dt class="font-size-h3 font-w600 text-dark text-center">Current Time</dt>
                    </div>
                    <div class="block-content block-content-full flex-grow-1 d-flex justify-content-between align-items-center bg-primary">
                        <p class="text-light text-center" id="current-timer"></p>
                        <!-- <div class="item item-rounded bg-body">
                            <i class="fa fa-shopping-cart font-size-h3 text-primary"></i>
                        </div> -->
                    </div>
                    <div class="block-content block-content-full block-content-sm bg-body-light font-size-sm">
                        <a class="font-w500 d-flex align-items-center" href="javascript:void(0)">
                            View all times
                            <i class="fa fa-arrow-alt-circle-right ml-1 opacity-25 font-size-base"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <div class="block block-rounded block-mode-loading-oneui">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Leaves</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                            <button type="button" class="btn-block-option">
                                <i class="si si-settings"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content p-0 text-center">
                        <div class="pt-3" style="height: 360px;">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <canvas class="js-chartjs-dashboard-earnings chartjs-render-monitor" style="display: block; height: 344px;" height="344"></canvas>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="block block-rounded block-mode-loading-oneui">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Presents</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                            <button type="button" class="btn-block-option">
                                <i class="si si-settings"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content p-0 text-center">
                        <div class="pt-3" style="height: 360px;">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <canvas class="js-chartjs-dashboard-sales chartjs-render-monitor" style="display: block;" height="344"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="block block-rounded">
                    <div class="block-header block-header-default">
                        <h3 class="block-title">Leaves Summary Overview</h3>
                        <div class="block-options">
                            <button type="button" class="btn-block-option" data-toggle="block-option" data-action="state_toggle" data-action-mode="demo">
                                <i class="si si-refresh"></i>
                            </button>
                        </div>
                    </div>
                    <div class="block-content block-content-full">
                        <div style="height: 400px;">
                            <div class="chartjs-size-monitor">
                                <div class="chartjs-size-monitor-expand">
                                    <div class=""></div>
                                </div>
                                <div class="chartjs-size-monitor-shrink">
                                    <div class=""></div>
                                </div>
                            </div>
                            <canvas class="js-chartjs-overview chartjs-render-monitor" style="display: block; width: 1009px; height: 400px;" width="1009" height="400"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- /Row-08 -->
        <!--        <checkin-modal v-model="checkinConfirmationModal" @checkin="checkin"></checkin-modal>-->
    </div>
</template>

<script>
export default {
    name: "UserDashboard"
}
</script>

<style scoped>

</style>
