import React from 'react';
import ReactDOM from 'react-dom';
function LoginBanner() {
    return (
        <section class="d-flex align-center h-100vh">
        <div class="container">
            <div class="row align-center">
                <div class="col-12">
                    <div class="t-center">
                        <div class="mb-2">
                            <h2>আমি একজন</h2>
                        </div>
                        <button class="button mr-2">শিক্ষক</button>
                        <button class="button button-2">শিক্ষার্থী</button>
                    </div>
                </div>
            </div>
        </div>
    </section>
    );
}

export default LoginBanner;

