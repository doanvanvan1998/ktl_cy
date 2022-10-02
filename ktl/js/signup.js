console.log('hello world, shiki~')


// handle step 4
document.querySelector('#tempStep4').addEventListener('click', () => {
    console.log('handle step 4');


    const step4Obj = {
        certs: [],
        awards: [],
        portfolio: '',
        link: ''
    }


    // handle get certification's value
    const certTags = document.querySelectorAll('.certificate');
    certTags.forEach(e => {
        step4Obj.certs
            .push({
                certName: e.querySelector('.certificate_name').value,
                certIssuedBy: e.querySelector('.certificate_issued_by').value,
                certIssuedDate: e.querySelector('.certificate_date_issued').value,
            });
    });

    //handle get award's value
    const awardTags = document.querySelectorAll('.award');
    awardTags.forEach(e => {
        step4Obj.awards
            .push({
                awardName: e.querySelector('.award_name').value,
                awardIssuedBy: e.querySelector('.award_issued_by').value,
                awardIssuedDate: e.querySelector('.award_date_issued').value,
                awardExpiredDate: e.querySelector('.award_date_expired').value,
                awardContent: e.querySelector('.award_content').value,
            });
    });

    // handle get portfolio's value
    step4Obj.portfolio = document.querySelector('#portfolio_file').files[0];

    // handle get email
    step4Obj.link = document.querySelector('#step4Url').value;

    return step4Obj;
});

