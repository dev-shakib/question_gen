import React from 'react';
import ReactDOM from 'react-dom';

function Banner() {
    return (
        <section className="banner-sec">
        <div className="container">
            <div className="row align-center">
                <div className="col-12 col-lg-6">
                    <div className="banner-caption">
                        <h2>প্রশ্ন যেনারেট</h2>
                    </div>
                </div>
                <div className="col-12 col-lg-6">
                    <div className="banner-img t-center t-lg-left mt-3 mt-0-lg">
                        <div>
                            <button className="button">এখনিই প্রশ্ন তৈরি করুন</button>
                        </div>
                    </div>
                </div>
            </div>
            <div className="row mt-2">
                <div className="col-12">
                    <div className="d-flex justify-center">

                    </div>
                </div>
            </div>
        </div>
    </section>
    );
}

export default Banner;
