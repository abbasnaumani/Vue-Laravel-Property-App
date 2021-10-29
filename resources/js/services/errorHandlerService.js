const errorHandlerService = {
    errors: {
        index: async (err) => {
            console.log('service for error');
            let error = { message: 'Something went wrong' };
            console.log('service check');
            if (err.response) {
                // The request was made and the server responded with a status code
                // that falls out of the range of 2xx
                error.message = err.response.data.message;
                console.log('error.response.data', err.response.data);
                console.log('error.response.status', err.response.status);
                console.log('error.response.headers', err.response.headers);
            } else if (err.request) {
                // The request was made but no response was received
                // `error.request` is an instance of XMLHttpRequest in the browser and an instance of
                // http.ClientRequest in node.js
                console.log('error.request', err.request);
            } else {
                // Something happened in setting up the request that triggered an Error
                console.log('Error', err.message);
            }
            // console.log('error.config', error.config);



            // let { graphQLErrors } = error;
            // if (graphQLErrors) {
            //     switch (graphQLErrors[0].extensions.category) {
            //         case 'authentication':
            //             window.location.href = '/v/login';
            //             break;
            //         case 'authorization':
            //             window.location.href = '/';
            //             break;
            //         case 'graphql':
            //             window.location.href = '/v/404';
            //             break;
            //     }
            // }
            return error;
        }
    }
}
export default errorHandlerService;
