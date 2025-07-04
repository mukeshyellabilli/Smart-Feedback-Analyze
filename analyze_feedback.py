# analyze_feedback.py
import nltk
from nltk.sentiment import SentimentIntensityAnalyzer 

nltk.download('vader_lexicon')
sia = SentimentIntensityAnalyzer()

with open("temp_feedback.txt", "r") as f:
    feedback = f.read()

score = sia.polarity_scores(feedback)['compound']

if score >= 0.05:
    print("Positive")
elif score <= -0.05:
    print("Negative")
else:
    print("Neutral")
