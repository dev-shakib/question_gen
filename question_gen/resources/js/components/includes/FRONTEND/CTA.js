import React from 'react';
import ReactDOM from 'react-dom';

function CTA() {
    return (
        <section className="cta-sec sec-padding">
        <div className="container">
            <div className="row align-center">
                <div className="col-12 col-lg-6">
                    <div className="cta-text">
                        <h2 className="fz-50">কীভাবে ব্যবহার করবেন</h2>
                        <p>পাশের ভিডিওটি দেখুন</p>
                    </div>
                </div>
                <div className="col-12 col-lg-6">
                    <div className="cta-img mt-3 mt-0-lg">
                        <iframe width="560" height="315" src="https://www.youtube.com/embed/K4XUiZAzX4U" title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                    </div>
                </div>
            </div>
        </div>
    </section>
    );
}

export default CTA;
