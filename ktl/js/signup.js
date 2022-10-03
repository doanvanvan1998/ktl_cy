console.log('hello world, shiki~')




// handle step 3
const handSubmitTempStep3 = () => {
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
        const selectTag = e.querySelector('.award_type');

        step4Obj.awards
            .push({
                awardName: e.querySelector('.award_name').value,
                awardIssuedBy: e.querySelector('.award_issued_by').value,
                awardIssuedDate: e.querySelector('.award_date_issued').value,
                awardType: selectTag.options[selectTag.selectedIndex].value,
                awardContent: e.querySelector('.award_content').value,
            });
    });

    // handle get portfolio's value
    step4Obj.portfolio = document.querySelector('#portfolio_file').files[0];

    // handle get email
    step4Obj.link = document.querySelector('#step4Url').value;

    console.log('step3: ', step4Obj);
    return step4Obj;
};


// handle step 4
const handSubmitTempStep4 = () => {
    const introductionObj = [];

    // handle get introduction's value
    const introductionTags = document.querySelectorAll('.self-introduction');
    introductionTags.forEach(e => {

        const selectTag = e.querySelector('.self_introduction_type');
        introductionObj.push({
            selfIntroductionTypeName: selectTag.options[selectTag.selectedIndex].innerText,
            selfIntroductionType: selectTag.options[selectTag.selectedIndex].value,
            selfIntroductionContent: e.querySelector('.self_introduction_content').value,
        });
    });

    console.log('step4: ', introductionObj);
    return introductionObj;
};

