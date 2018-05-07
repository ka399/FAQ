# FAQ (Frequently Asked Questions) 
## IS601 Final Project using Laravel and Php (under the guidance of Prof Williams) 
#### Submitted by : Kashish Agarwal (ka399@njit.edu) - MS in Information Systems, NJIT 

# Project Theme:

FAQ project provides a platform to its users to exchange knowledge through posting questions and answers collaboratively. User needs to be registered with FAQ website in order to view/post questions and answers. 

Overall functionality of this project enables registered users to: 

1. View all questions and corresponding multiple answers posted by different users
2. Post their questions in the forum to seek response
3. Post answers to available questions
4. Create/Update thier profile
5. View the archived questions sorted by month & year - Summary and Details. [Feature]
6. Filter and View user's question and all questions.
7. Perform CRUD operations on Profile.Questions and Answers repository.

# Feature(s) Implemented:
1. Main Feature : Archive Sidebar that displays the question archive summary by month-year(count) and each link when clicked displays the filtered list of questions . This feature is implemented using Laravel Eloquent & View Composers (Effective way of sharing Data between Views Using Laravel)
View Composers
2. Quick Links Side bar : to filter out User Questions and All questions.
3. Breadcrumbs Navigation : It allows users to keep track and maintain awareness of their locations within this website.
4. Profile Picture : User can upload thier profile picture and change it when needed. Profile picture is displayed on top right navigation bar. This feature also used View Composer technique. 

Below are some Epics and respective User Stories along with description how to use the above features and relevant acceptance criteria.

## Epic 01 : Provide archived questions sidebar menu to view the filtered questions easily.

### User Story 01: 
As a registered user, I want to see the quick snapshot of archived questions for a respective month-year along with total question count during my session so that I can view the question statistics at any point of time.

### Acceptance Criteria:
1. Archive Sidebar on the right side of the page.
2. Sidebar should display archived question stats in month-year(count).

### User Story 02: 
As a registered user, I want to see the quick snapshot of archived questions sorted by year and month in descending order so that I can easily understand the graph/statistics of posted question at any point of time.

### Acceptance Criteria:
1. Archives Sidebar should display archived question stats in month-year(count) ordered by year desc and month desc.

### User Story 03: 
As a registered user, I want to navigate and display filtered archived questions list for a respective month & year during my session so that I can view the old questions posted for the particular time period.

### Acceptance Criteria:
1. User should be able to click on the links shown on archives sidebar.
2. On click, filtered question result set should be populated.

### User Story 04: 
As a registered user, I want to see correct list of archived questions paginated for that month & year so that I can view the correct set questions posted for the particular time period. For e.g. May 2018 questions should not have May 2017 questions.

### Acceptance Criteria:
1. On click, filtered question result set should be populated in a paginated way. (multiple pages)
2. Count of questions should match the count displayed in archives sidebar.
3. Question dataset should be correct as per the conditional month and year criteria.

###  User Story 05: 
As a registered user, I want to see helpful archived questions sidebar menu on multiple pages so that I can easily view the questions statistics and navigate through links at any given point of time. 

### Acceptance Criteria:
1. Archives Sidebar menu is present on Home, Question, Answer View Pages.
2. All links should be clickable by the user and should throw no error.
3. Correct question dataset should be populated on navigation thorugh archive sidebar links.

## Steps to use the archive feature: 
1. Register and Login in to the FAQ Application
2. View the Archives sidebar menu on the right side of the page.
3. Click on each link to see the filtered result by month and year.
4. Verify that the questions gets populated in the paginated way (6 questions per page).
5. Click on "View More" to view wach question details.
6. Verify that Archives sidebar is also present on the right side on questions page.
7. post new answer / view any answer posted for that question using "View More" option.
8. Verify that archives sidebar menu is present on answers page also.
9. click at any oint of time on archives sidebar menu to view the filtered results.

## Epic 02 : Provide quick links sidebar to filter questions posted by user and all questions easily.

### User Story 01: 
As a registered user, I want to see the quick links of questions posted by myself so that I can view my questions at any point of time.

### User Story 02: 
As a registered user, I want to see the quick links of questions posted by all users so that I can view all questions on FAQ website at any point of time.

### User Story 03: 
As a registered user, I want to see the count on the quick links of questions posted by me and all users so that I can view the questions statistics easily at any point of time.

### User Story 04: 
As a registered user, I want to see the correct results of questions posted by me and all users so that I can be sure about the results at any point of time.

Note : Simlar steps like archive sidebars holds good to use this feature.

## Epic 03 : Provide breadcrumbs navigation for user to navigate easily on FAQ website.

### User Story 01: 
As a registered user, I want to see the navigation links populated on top of the page so that I can keep track on my location on this website.

### User Story 02: 
As a registered user, I want to see the full path/trail of the location e.g. home/login/forgot password so that I can relate to the exact depth of links easily.

### User Story 03: 
As a registered user, I should be easily able to navigate through the eash and every parent link displayed as a breadcrumb path so that I can easily navigate through the previous pag without any hassle.

### User Story 04: 
As a registered user, I should see the breadcrumbs link on top of the each and every page I visit so that I don't lose the track of my visited path/pages easily.

## Epic 04 : Provide user profile picture feature.

### User Story 01: 
As a registered user, I want to see my profile picture on top of the navigation bar on each and every page so that I know easily that I am logged into FAQ  website.

### User Story 02: 
As a registered user, I want to see my profile picture with other details on "my profile" view so that I can seee that my profile picture exists in the system and upddated correctly in the profile.

### User Story 03: 
As a registered user, I should be easily able edit my profile and update my profile picture so that I can change my new profile picture easily for my account.

### User Story 04: 
As a new user-> I should be able to create my pofile abd upload the profile picture to my account so that I can associate my fresh user profile with my registered user id.

### Other changes I did:
1. Navigation bar has NJIT Logo/FAQ logo.
2. Welcome page has carousel and other pages of website has a jumbotron image.
3. Look and feel of navigation buttons has been changed (Buttons, Links, etc)
4. Question Title has beeen added so that questions are stored along with title.
5. Questions will be displayed along with question title and posted on date. If the question gets updated, new field "revised on" date gets displayed to keep the track of change history.
6. Answers (question page) will be displayed under the questions along with details - Answered by whom and when.
7. Answer details (Answer page) will be displayed along with Answered by,email and posted on date. If the answer gets updated, new field "revised on" date gets displayed to keep the track of change history.


## To run this FAQ project:
1. git clone https://github.com/ka399/FAQ.git
2. CD into FAQ, open terminal and run composer install
3. cp .env.example to .env -> add database details
4. run: php artisan key:generate
5. setup database / Add database.sqlite file to database folder and connect or refer https://laravel.com/docs/5.6/database
6. Run: php artisan migrate to populate the database tables 
7. Run: unit tests: phpunit to view the results of all unit and feature test assertions.
8. Run: seeds php artisan migrate:refresh --seed --> seeds Faker data to tables.
9. Edit Run Configuration->Add PHP Script: server single Instance,Map Artisan file, Arguments serve,Setup localhost (http://localhost:8000)
10. Run the project -> register, login and ready to use.
For any questions or support -> mail me at ka399@njit.edu

## Heroku Deployed Link
https://is601ka399faq.herokuapp.com

## Thank You Note:
Special Thanks to Professor Williams for his support throughout the course make learning laravel easy and interesting. Appreciate his effort, time and guidance during this course. Regards.



