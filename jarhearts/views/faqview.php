<body>
    <h1>Frequently Asked Questions</h1>
<p>
    <strong>Where is the link to your video? </strong>
</p>
<p>
    <strong> </strong>
    Okay, this is just me making sure that my link to my video is included in my files, since I didn't want to zip my video in with my source code. The link is
    here: <a href="http://www.youtube.com/watch?v=CdTLslrzftI">www.youtube.com/watch?v=CdTLslrzftI</a>. Carry on.
</p>
<p>
    <strong>What is the UniqueID? Why is it necessary?</strong>
</p>
<p>
    <strong> </strong>
    The UniqueID is a randomly generated string of 12 chars assigned to each user when they register. At first, I implemented it just to see if I could,
    because I wanted to create URLS like youtube urls. Then, I realized it could be a good security feature, because rather than submitting notes by specifying
    a username which could be guessed by malicious humans, leading to unHeartnotes, a uniqueID url could only be accessed through intentional sending. I chose
    to make that design decision for security, curiosity, and appearances [complicated urls tend to seem more professional to me for some reason?]. However, I
    recognize the drawbacks in that whenever I was doing data manipulation with my SQL table, I often had to convert between uniqueID, username, and userID
    (the sessionID), which at times felt confusing and redundant.
</p>
<p>
    <strong>Why is the homepage so different from the rest of the website?</strong>
</p>
<p>
    After I got the functions I wanted on my website to work, I decided to try exploring css more. I changed the home page to parallax scrolling and played
    around a lot more with CSS. I liked the results aesthetically, and it gave my website more of an ooh factor (at least to my non CS50 friends), but I don't
    necessarily think it would be the best way to display tables and notes, so I kept them separate styles. Although, now that I'm writing about it, perhaps an
    infinite scroll page for past notes would be sweet.
</p>
<p>
    Because I only had access to my own computer and phone, the CSS was optimized (or at least attempted) for my screen. I played around with % instead of
    absolutes whenever I could, but I know there are still issues when viewed in screens of different dimensions.
</p>
<p>
    Also, all images on the homepage were taken by me.
</p>
<p>
    <strong>Why doesn't the website function work sometime?</strong>
</p>
<p>
    As far as I can tell, iframe embedding websites isn't very reliable, due to browser and website issues. I could get most https:// websites to work, but not
    all, and couldn't really discern a pattern. However, I still wanted to include the option, so also left a direct link to the provided URL below that,
    thinking that if the embedding didn't work, at least the recipient would have access to the website.
</p>
<p>
    <strong>How does the new note a day function work?</strong>
</p>
<p>
    When a note is first used, the date it is viewed is stored in the table. Each subsequent visit to the page, that date is compared with the current date. If
    the dates are not the same, I select all rows of notes to that user that are still unused, and randomly choose one within to display for that date.
</p>
<p>
    <strong>Why would I need to view past uploads and past notes? Shouldn't there be separate user and recipient accounts?</strong>
</p>
<p>
    I thought a lot about this, as my intuition was that most users would probably send one or two notes to a specific person as requested by the organizer,
    but would probably not receive notes themselves. Ultimately, I decided not to split accounts because it would have made my user table either larger (double
    entries) or clunkier (more columns to select from). Also, then users would have to log in and out to do different functions, which also would have made it
    obnoxious for me to test things.
</p>
<p>
    <strong>What is this google-api-php-client folder doing in here?</strong>
</p>
<p>
    I wanted to try integrating google account authentication, but ultimately couldn't figure it out before the deadline, and decided it wasn't really a
    priority, since the website doesn't need more than a username and password to do its work. However, I think next, I'll try to add an emailing feature,
    where instead of sending someone back a note[senders probably wouldn't be regularly checking their account], you can email them a thank you, which would
    require access to a gmail account, so I would need to integrate with gmail.
</p>
<p>
    <strong>What's next?</strong>
</p>
<p>
    I learned SO much from doing this project. I don't have a copy of what I put down for project proposal, but I know I didn't get anywhere near that amount
    of features, because I didn't realize how long it takes to write code for even the simplest of functions. For instance, when I tried to get a dynamic form,
    it took me 3 hours to realize that document.getElementsByClassName wasn't working, and that I needed to restructure my form (I still don't know why the
    function didn't work). It was another couple of hours to get the form validation for boxes working. I had to restructure my entire table halfway through
    because I realized there were redundancies. I spent a couple of days trying to figure out local storage on a chrome extension, wanting a way for users to
    be able to see today's note without going to the website, but got lost in documentations, because a lot of chrome updates completely changed variable
    names.
</p>
<p>
    That being said, I really want to continue working on this project, even after the class is over. I think the chrome extension and google log in will be my
    next step.
</p>
</body>