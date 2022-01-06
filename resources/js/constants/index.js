export const ApiResponse = {
    SUCCESS: 'SUCCESS',
    FAILED: 'FAILED',
    ERROR: 'ERROR',
    SUCCESS_CODE: 200
}
export const LocalStorageKeys = {
    LOGGED_IN: 'loggedIn',
    USER_EMAIL: 'userEmail',
    PROFILE: 'profile',
    ACCESS_TOKEN: 'accessToken',
    TTL: 5 * 60 * 1000
}
export const UserRoles = {
    SUPER_ADMIN: 1,
    ADMIN: 2,
    AGENT: 3
}
export const PropertyPurpose = {
    FOR_SALE: 1,
    FOR_RENT: 2,
}
export const PropertyType = {
    HOMES:1,
    PLOTS:2,
    COMMERCIAL:3,
}
export const HomesSubType = {
    HOUSE:1,
    FLAT:2,
    UPPER_PORTION:3,
    LOWER_PORTION:4,
    FARM_HOUSE:5,
    ROOM:6,
    PENT_HOUSE:7
}
export const PlotsSubType = {
    RESIDENTIAL_PLOT:8,
    COMMERCIAL_PLOT:9,
    AGRICULTURAL_PLOT:10,
    INDUSTRIAL_PLOT:11,
    PLOT_FILE:12,
    PLOT_FORM:13,
}
export const CommercialSubType = {
    OFFICE:14,
    SHOP:15,
    WHERE_HOUSE:16,
    FACTORY:17,
    BUILDING:18,
    OTHER:19
}
export const OccupancyStatus = {
    VACANT:1,
    OCCUPIED:0
}
