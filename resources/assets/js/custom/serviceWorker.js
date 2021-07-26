function getBaseURL() {
    let _url = window.location.href;
    let res = _url.split("/");
    let baseURL = res[0] + "//" + res[2] + "/" + res[3];
    // let baseURL = res[0] + "//" + res[2];

    return baseURL;
}
